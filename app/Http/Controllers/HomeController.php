<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User ;
use App\Models\Cart ;
use App\Models\Item ;
use App\Models\Order ;
use App\Models\Comment ;
use App\Models\Reply ;
use RealRashid\SweetAlert\Facades\Alert;

use Session;
use Stripe;




class HomeController extends Controller
{

    public function index(){
      if(Auth::id()){
        return redirect('redirect');
      }else{

        $products = Item::where('id','>=',1)->latest()->paginate(6);

        $comments = Comment::where('id','>=',1)->latest()->get();

        $replies = Reply::where('id','>=',1)->latest()->get();

        return view('home',compact('products','comments','replies'));

      }
    }


    public function redirect(){
      if(Auth::id()){
        $usertype =Auth::user()->usertype;

          if ($usertype==1){
            // total orders
            $total_orders = Order::all()->count();
            // fetching the processing orders
            $processing_orders = Order::where('delivery_status','=','processing')->get();
            // total processing orders
            $total_processing_orders = $processing_orders->count();

            // fetching and counting the total delivered orders
            $total_delivered_orders = Order::where('delivery_status','=','delivered')->get()->count();

            // counting the total number of customers
            $total_users= User::all()->count();

            // counting the total products
            $total_products= Item::all()->count();

            // counting all the prices for all the orders made
            $orders = Order::all();

            $total = 0;
            foreach ($orders as $order) {
              $total = $total + $order->product_price ;
            }



            return view ('admin.home',compact('total_orders','total_processing_orders','total_delivered_orders','total_users','total_products','total'));
          }else{
            $products = Item::where('id','>=',1)->latest()->paginate(6);
             $user_id = Auth::user()->id ;
            $cartCount = Cart::where('user_id','=',$user_id)->count();
            $orderCount = Order::where('user_id','=',$user_id)->count();

            $comments = Comment::where('id','>=',1)->latest()->get();

            $replies = Reply::where('id','>=',1)->latest()->get();



            return view('home',compact('products','cartCount','orderCount','comments','replies'));
          }
      }else{
        return redirect('/login');
      }

    }

     public function view_products($id){
        if(Auth::id()){
          $product  =Item::find($id);
          $user_id = Auth::user()->id;

          $cartCount = Cart::where('user_id','=',$user_id)->count();
          return view ('Homedivision.view_products')->with('product',$product)->with('cartCount',$cartCount);
        }else{
          $product  =Item::find($id);
          return view ('Homedivision.view_products')->with('product',$product);
        }


     }

     public function addcart(Request $request ,$id)
     {
       if(Auth::id()){
          $user = Auth::user();
          $product = Item::find($id);


          $cart = new Cart ;
          $cart->name = $user->name;
          $cart->email = $user->email;
          $cart->phone = $user->phone;
          $cart->address = $user->address;
          $cart->user_id = $user->id;
          $cart->product_name = $product->name;
          $cart->quantity = $request->quantity;

          // checking if there is a discount price or not
          if($product->discount_price!=null){
          $cart->product_price= $product->discount_price *$request->quantity;

        }else{
          $cart->product_price= $product->price *$request->quantity;
        }

        $cart->product_image = $product->image;
        $cart->product_id = $product->id;
        $cart->save();

        Alert::success('Product has been added to cart','Go to cart and proceed to order');

         return redirect()->back();

       }else {
         return redirect('/login');
       }
     }

     public function view_cart(){
       if(Auth::id()){
         $user_id=Auth::user()->id;
         $user_cart = Cart::where('user_id','=',$user_id)->latest()->paginate(4);
         $cartCount = Cart::where('user_id','=',$user_id)->count();
         $orderCount = Order::where('user_id','=',$user_id)->count();
         return view('Homedivision.viewCart',compact('user_cart','cartCount','orderCount'));
       }else {
         return redirect('/login');
       }

     }

     public function deletecart($id){
       $cart = Cart::find($id);
       $cart->delete();
       return redirect()->back()->with('message','cart removed');
     }

     public function cash_order(){
       $user = Auth::user();
       $user_id = Auth::user()->id;
       $user_cart = Cart::where('user_id','=',$user_id)->latest()->get();

       // Now storing moving the user's cart to the order table
       foreach($user_cart as $cart){
       // pulling user details from the user table
       $order = new Order;
       $order->name = $cart->name;
       $order->phone = $cart->phone;
       $order->user_id = $cart->user_id;
       $order->email = $cart->email;
       $order->address = $cart->address;
       // pulling from the user's cart to the order table
       $order->product_name = $cart->product_name;
       $order->quantity = $cart->quantity;
       $order->product_image = $cart->product_image;
       $order->product_price = $cart->product_price;
       $order->product_id = $cart->product_id;
       // order status
       $order->payment_status = "Payment on delivery";
       $order->delivery_status = 'Processing';
       $order->save();

       $cart_id = $cart->id;
       $cart = Cart::find($cart_id);
       $cart->delete();
     }

     Alert::success('Order placed successfully','Thank you for shopping with us ');

     return redirect()->back();
     }

     public function stripe($total)
     {
       return view ('Homedivision.stripe',compact('total'));
     }

     public function stripePost(Request $request,$total)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thank you for payment"
        ]);

        $user = Auth::user();
        $user_id = Auth::user()->id;
        $user_cart = Cart::where('user_id','=',$user_id)->latest()->get();

        // Now storing moving the user's cart to the order table
        foreach($user_cart as $cart){
        // pulling user details from the user table
        $order = new Order;
        $order->name = $cart->name;
        $order->phone = $cart->phone;
        $order->user_id = $cart->user_id;
        $order->email = $cart->email;
        $order->address = $cart->address;
        // pulling from the user's cart to the order table
        $order->product_name = $cart->product_name;
        $order->quantity = $cart->quantity;
        $order->product_image = $cart->product_image;
        $order->product_price = $cart->product_price;
        $order->product_id = $cart->product_id;
        // order status
        $order->payment_status = "Paid with card";
        $order->delivery_status = 'Processing';
        $order->save();

        $cart_id = $cart->id;
        $cart = Cart::find($cart_id);
        $cart->delete();
      }


        Session::flash('success', 'Payment successful!');

        // After payment now moving all the items in the cart to the order table
        return back();
    }

    public function view_user_order()
    {
      if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==0){
          $user_id= Auth::user()->id;
          $user_orders = Order::where('user_id','=',$user_id)->latest()->paginate(6);
          $user_id = Auth::user()->id ;
         $cartCount = Cart::where('user_id','=',$user_id)->count();
         $orderCount = Order::where('user_id','=',$user_id)->count();


          return view('Homedivision.user_order',compact('user_orders','cartCount','orderCount'));
        }
      }
    }

     public function cancel_order($id)
     {
       $order = Order::find($id);
       $order->delivery_status = 'order cancelled';
       $order->save();

       return redirect()->back();
     }

     public function add_comment(request $request)
     {
       if(Auth::id()){
         $usertype= Auth::user()->usertype;
         if($usertype==0){

          $user_id = Auth::user()->id;

          $comment = new Comment ;
          $comment->name = Auth::user()->name;
          $comment->user_id = $user_id;
          $comment->comment = $request->comment;
          $comment->save();

          return redirect()->back();

         }
       }else {
         return redirect('/login');
       }
     }


     public function reply_comment(request $request)
     {

      if(Auth::id()){
        $usertype = Auth::user()->usertype;
        if($usertype==0){

          $reply = new Reply;
          $reply->name = Auth::user()->name;
          $reply->user_id = Auth::user()->id;
          $reply->comment_id = $request->comment_id;
          $reply->reply = $request->reply;
          $reply->save();

          return redirect()->back();


        }
      }else {
        return redirect('/login');
      }

     }

     public function searchProduct(request $request){

       if(Auth::id()){
         $search = $request->searchProduct;
         $products = Item::where('name','like','%'.$search.'%')->orWhere('category','like','%'.$search.'%')->latest()->paginate(6);

         $comments = Comment::where('id','>=',1)->latest()->get();

         $replies = Reply::where('id','>=',1)->latest()->get();
         $user_id = Auth::user()->id ;

         $cartCount = Cart::where('user_id','=',$user_id)->count();
         $orderCount = Order::where('user_id','=',$user_id)->count();

          return view('home',compact('products','replies','comments','cartCount','orderCount'));
       } else {
         $search = $request->searchProduct;
         $products = Item::where('name','like','%'.$search.'%')->orWhere('category','like','%'.$search.'%')->latest()->paginate(6);

         $comments = Comment::where('id','>=',1)->latest()->get();

         $replies = Reply::where('id','>=',1)->latest()->get();

          return view('home',compact('products','replies','comments'));
       }



     }
}
