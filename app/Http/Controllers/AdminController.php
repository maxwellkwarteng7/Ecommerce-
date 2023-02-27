<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use PDF;
use Notification;
use App\Notifications\sendEmailNotification;


use DB;

class AdminController extends Controller
{
    public function category()
    {
      $categories = Category::where('id','>=',1)->latest()->paginate(4);
      return view ('adminpages.category',compact('categories'));
    }

    public function addcategory(request $request)
    {
      $category = new Category ;
      $category->name = $request->name;
      $category->save();
      return redirect()->back()->with('message','category added successfully');
    }

    public function deleteCategory($id)
    {
      $category=Category::find($id);
       $category->delete();
       return redirect()->back()->with('message','category deleted successfully ');
    }

    public function searchCategory(request $request)
    {
      $search =   $request->search;
       $categories = Category::where('name','like','%'.$search.'%')->latest()->paginate(5);
      return view ('adminpages.category',compact('categories'));
    }

    public function addproduct()
    {
      $categories = Category::orderBy('id','desc')->get();
      $products = Item::where('id','>=',1)->latest()->paginate(10);
      return view ('adminpages.addproduct', compact('categories','products'));
    }

      public function additem(Request $request){
        $this->validate($request,[
          'name'=>'required',
          'description'=>'required',
          'price'=>'required',
          'dis_price'=>'',
          'image'=>'required|image',
          'category'=>'required',
        ]);


         $product = new Item ;
         $product->name = $request->name ;
         $product->description = $request->description ;
         $product->quantity = $request->quantity ;
         $product->price = $request->price ;
         $product->discount_price = $request->dis_price ;
         $product->category = $request->category ;

         $image = $request->file('image');
         $imagename = time().'.'.$image->getClientOriginalName();
         $request->file('image')->move('products',$imagename);

         $product->image= $imagename;
         $product->save();

         return redirect()->back()->with('message','product added successfully');


      }

      public function searchProduct(request $request)
      {
          $categories = Category::orderBy('id','desc')->get();
        $search =   $request->search;
        $products = Item::where('name','like','%'.$search.'%')->orWhere('category','like','%'.$search.'%')->latest()->paginate(5);
        return view ('adminpages.addproduct',compact('products','categories'));
      }


      public function deleteproduct($id)
      {
        $product = Item::find($id);
        storage::delete('products'.$product->image);
        $product->delete();
        return redirect()->back()->with('message','product deleted successfully');
      }

      public function editproduct($id)
      {
          $categories = Category::orderBy('id','desc')->get();
        $product= Item::find($id);
        return view ('adminpages.editproduct',compact('product','categories'));
      }

      public function storeupdatedproduct(Request $request,$id){
          $old_product = Item::find($id);
        $this->validate($request,[
          'name'=>'required',
          'description'=>'required',
          'price'=>'required',
          'dis_price'=>'',
          'image'=>'image',
          'category'=>'',
        ]);




         $product = Item::find($id) ;
         $product->name = $request->name ;
         $product->description = $request->description ;
         $product->quantity = $request->quantity ;
         $product->price = $request->price ;
         $product->discount_price = $request->dis_price ;
         $product->category = $request->category ;


         if($request->hasfile('image')){
         $image = $request->file('image');
         $imagename = time().'.'.$image->getClientOriginalName();
         $request->file('image')->move('products',$imagename);
       }else {
         $imagename = $old_product->image;
       }

         $product->image= $imagename;
         $product->save();

         return redirect('/addproduct')->with('message','product updated successfully');


      }

      public function orders(){
        if(Auth::id()){
          $user_id = Auth::user()->id;
          if($user_id==1){
        $orders = Order::where('id','>=',1)->latest()->paginate(10);
        return view('adminpages.orders',compact('orders'));
      }else{
        return redirect('redirect')->with('error','Unauthorized access');
      }
      }else{
        return redirect('/login');
      }
      }

      public function delivered($id)
      {
        $order = Order::find($id);
        $order->delivery_status = "delivered";
        if($order->payment_status=="Payment on delivery")
        {
        $order->payment_status = "Paid with cash";
        }
        $order->save();


        return redirect()->back();


      }


      public function searchOrders(request $request)
      {
        $search = $request->search;
        $orders = Order::where('name','like','%'.$search.'%')->orWhere('delivery_status','like','%'.$search.'%')->orWhere('phone','like','%'.$search.'%')->orWhere('product_name','like','%'.$search.'%')->paginate(10);

        return view('adminpages.orders',compact('orders'));

      }

      public function print_order($id)
      {
        $order= Order::find($id);
        $print = PDF::loadView('adminpages.pdf',compact('order'));
        return $print->download('Order_details.pdf');

      }

      public function send_email($id){
        $order = Order::find($id);

        return view('adminpages.send_email',compact('order'));


      }

      public function send_user_email(request $request, $id)
      {
        $order= Order::find($id);

        $details =[
          'greeting' =>$request->greeting,
          'firstline'=>$request->firstline,
          'body'=>$request->body,
          'button'=>$request->button,
          'url'=>$request->url,
          'lastline'=>$request->lastline,
        ];

        Notification::send($order , new sendEmailNotification($details));

        return redirect()->back()->with('message','Email sent successfully');
      }




}
