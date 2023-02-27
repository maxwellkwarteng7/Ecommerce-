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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
   </head>
   <body>

         <!-- header section strats -->
         @include('Homedivision.navbar')

         @include('sweetalert::alert')
         <div class="">
           <a href="{{url('/')}}" class="btn btn-secondary btn-sm">Go back</a>
         </div>

         {{-- Creating a table to put inside the user's cart  --}}


         <div class="col-12 p-4" style="margin:auto">
           <div class="table-responsive">
              <table style="margin:auto; border:solid crimson">
              <thead>
                <th class="p-3">Product name</th>
                <th class="p-3">Price </th>
                <th class="p-3">Quantity</th>
                <th class="p-3">Image</th>
                <th class="p-3">Action</th>
              </thead>
              @if(count($user_cart)>0)
              <?php $total=0 ;?>

              @foreach($user_cart as $cart)
              <tbody align="center" >
                <td class="p-3">{{$cart->product_name}}</td>
                <td class="p-3"> Ghs {{$cart->product_price}}</td>
                <td class="p-3">{{$cart->quantity}}</td>
                <td class="p-3"> <img style="width:150px ;height:90px" src="/products/{{$cart->product_image}}" alt=""></td>
                <td> <a onclick="confirmation(event)" class="btn btn-danger" href="{{url('/deletecart',$cart->id)}}">Remove</a> </td>



              </tbody>
              <?php $total +=$cart->product_price ?>

            @endforeach
          @else
            <tbody>
              <td></td>
              <td></td>
              <td>No product has been added to cart !!</td>
            </tbody>
          @endif

            </table>
          </div>

            @if(count($user_cart)>0)
            <div class="text-center p-2">
              <h3>Total Price :Ghs {{$total}}</h3>
            </div>

            <div class="text-center">
              <h1 class="p-2" style="font-size:20px; font-family:verdana;">Proceed to order</h1>
              <a onclick="cashDelivery(event)" class="btn btn-primary" href="{{url('/cash_order')}}">Cash on delivery</a>
              <a onclick="cardPayment(event)" class="btn btn-success" href="{{url('/stripe',$total)}}">Stripe payment</a>
              <a onclick="cardPayment(event)" class="btn btn-success" href="{{url('/hubtel',$total)}}">Hubtel payment</a>
            </div>
          @endif
            {{$user_cart->links()}}
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
      <script type="text/javascript">
      function confirmation(ev){
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log('urlToRedirect');
        swal({
          title: 'Are you sure to delete this product ?',
          text:'You will not be able to revert this!',
          icon:'warning',
          buttons:true,
          dangerMode:true
        })
        .then((willCancel) => {
          if(willCancel){
            window.location.href = urlToRedirect;
          }
        });
      }

      // cash delivery confirmation
      function cashDelivery(ev){
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');
        console.log('urlToRedirect');
        swal({
          title: 'Are you sure you want to order ?',
          text:'You will not be able to revert this!',
          icon:'warning',
          buttons:true,
          dangerMode:true
        })
        .then((willCancel) => {
          if(willCancel){
            window.location.href = urlToRedirect;
          }
        });
      }

      </script>
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
