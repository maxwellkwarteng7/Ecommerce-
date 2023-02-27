<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container text-center">
      <div class="p-3 text-center">
        <div class="p-2">
          <label>Customer name :  <h3>{{$order->name}}</h3></label>
        </div>
        <div class="p-2">
          <label>Customer Phone : <h3>{{$order->phone}}</h3></label>
        </div>
        <div class="p-2">
          <label>Customer email : <h3>{{$order->email}}</h3> </label>
        </div>
        <div class="p-2">
          <label>Customer address : <h3>{{$order->address}}</h3></label>
        </div>
        <div class="p-2">
          <label>Product name : <h3>{{$order->product_name}}</h3> </label>
        </div>
        <div class="p-2">
          <label>Product price : <h3> Ghs {{$order->product_price}}</h3></label>
        </div>
        <div class="p-2">
          <label>Product quantity :  <h3>{{$order->quantity}}</h3></label>
        </div>

        <div class="p-2">
          <label>Payment Status :  <h3>{{$order->payment_status}}</h3></label>
        </div>
        <div class="p-2">
          <label>delivery Status : <h3>{{$order->delivery_status}}</h3></label>
        </div>
        <div class="p-2">
          <label>Product image : </label>
          <div class="">
            <img style=" width:450px; height:250px" src="products/{{$order->product_image}}" alt=""></
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
