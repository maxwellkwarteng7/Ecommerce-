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
   </head>
   <body>

         <!-- header section strats -->
         @include('Homedivision.navbar')
         @include('inc.messages')
         <div class="">
           <a href="{{url('/')}}" class="btn btn-secondary btn-sm">Go back</a>
         </div>

         <!-- end header section -->
         <!-- slider section -->




           {{-- product card  --}}


            <div class="col-sm-6 col-md-4 col-lg-4 p-5" style=" margin:auto;">
               <div class="box">
                 {{-- product image  --}}
                  <div class="img-box p-2 mr-1">
                     <img style="width:450px ; height:250px" src="products/{{$product->image}}" alt="">
                  </div>
                  {{-- product name  --}}

                  <div class="detail-box">
                    <h6 class="p-1">
                      Name :  {{$product->name}}
                    </h6>
                    {{-- product price   --}}

                     @if($product->discount_price!=null)
                     <h6  >
                    Old Price: <span style="text-decoration:line-through; color:red">
                      Ghs {{$product->price}}
                    </span>
                     </h6>
                     <h6>
                      New Price : <span style="color:blue">
                        Ghs {{$product->discount_price}}
                      </span>
                     </h6>
                   @else
                     <h6 style="color:blue" >
                     Price:   Ghs {{$product->price}}
                     </h6>
                   @endif
                   {{-- product description  --}}

                   <h6>
                    Description: {{$product->description}}
                   </h6>
                   {{-- product quantity  --}}

                   <h6>
                    Available quantity: {{$product->quantity}}
                   </h6>
                   {{-- add to cart button--}}

                   <h6>
                     <form class="mt-1" action="{{url('/addcart',$product->id)}}" method="post">
                       @csrf
                       <input type="number" name="quantity" value="1" min="1">
                       <input type="submit"  value="Add to cart">
                     </form>
                   </h6>
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
