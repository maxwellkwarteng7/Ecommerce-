<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <base href="/public">

      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />

      <style media="screen">

      </style>
   </head>
   <body>

         <!-- header section strats -->
         @include('Homedivision.navbar')
         @include('inc.messages')
         <div class="">
           <a href="{{url('/')}}" class="btn btn-secondary btn-sm">Go back</a>
         </div>

         {{-- Creating a table to put inside the user's cart  --}}

         <div class="col-12">
           <div class="container p-3">
           <div class="table-responsive">
             {{-- <div class="table"> --}}
               <table style=" border:solid crimson; background:whitesmoke; margin:auto;">
                 <thead>
                   <th class="p-3">Product name</th>
                   <th class="p-3">Price </th>
                   <th class="p-3">Quantity</th>
                   <th class="p-3">Image</th>
                   <th class="p-3">Payment status</th>
                   <th class="p-3">Delivery status</th>
                   <th class="p-3">Action</th>
                 </thead>
                 @if(count($user_orders)>0)

                 @foreach($user_orders as $order)
                 <tbody align="center" >
                   <td class="p-3">{{$order->product_name}}</td>

                   <td class="p-3"> Ghs {{$order->product_price}}</td>

                   <td class="p-3">{{$order->quantity}}</td>

                   <td class="p-3"> <img style="width:150px ;height:90px" src="/products/{{$order->product_image}}" alt=""></td>

                   <td class="p-3">{{$order->payment_status}}</td>
                   <td class="p-3">{{$order->delivery_status}}</td>

                   @if($order->delivery_status=='Processing')
                   <td> <a onclick="return confirm('Are you sure you want to cancel order ?')" class="btn btn-danger btn-sm" href="{{url('/cancel_order',$order->id)}}">cancel order</a> </td>
                 @else
                   <td>
                     <a class="btn btn-info btn-sm" >Not allowed</a>
                   </td>
                 @endif
                 </tbody>

               @endforeach
             @else
               <tbody>
                 <td></td>
                 <td></td>
                 <td>You have no orders yet !!</td>
               </tbody>
             @endif

               </table>

               <div class="p-3">
                 {{$user_orders->links()}}
               </div>

             {{-- </div> --}}

           </div>
         </div>


         </div>









      <!-- footer start -->
      @include('Homedivision.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="js/custom.js"></script>
   </body>
</html>
