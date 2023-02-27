<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
   @include('admin.css')


  <style media="screen">
    label{
      display: inline-block;
      width:200px;
    }
    #textcolor{
      color:white;
    }
  </style>
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
         @include('admin.sidebar')
            <!-- partial -->
            @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @include('inc.messages')

            {{-- form for adding product --}}
            <form action="{{url('/storeupdatedproduct',$product->id)}}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="p-2">
                  <h1>Edit Product</h1>
                </div>
               <div class="p-2 ">
                 <label>Product name</label>
                 <input type="text" class="text-dark" name="name" value="{{$product->name}}" placeholder="Enter product name" required>
               </div>

               <div class="p-2">
                 <label>Description</label>
                 <input type="text" value="{{$product->description}}" class="text-dark" name="description" placeholder="Enter  description" required>
               </div>

               <div class="p-2 ">
                 <label>Price</label>
                 <input type="number" value="{{$product->price}}" class="text-dark" name="price" placeholder="Product price" required>
               </div>

               <div class="p-2 ">
                 <label>Quantity</label>
                 <input type="number" value="{{$product->quantity}}" class="text-dark" name="quantity" placeholder="quantity of product" required>
               </div>

               <div class="p-2 ">
                 <label> Discount price</label>
                 <input type="text" class="text-dark" name="dis_price" value="{{$product->discount_price??null}}" placeholder="Enter discount price">
               </div>

               <div class="p-2 ">
                 <label>Category</label>
                 <select class="text-dark" name="category" >
                   <option value="{{$product->category}}" selected>{{$product->category}}</option>
                   @foreach($categories as $category)
                   <option value="{{$category->name}}">{{$category->name}}</option>
                 @endforeach
                 </select>
               </div>

               <div class=" p-2">
                  <label> Old image</label>
                  <img style="width:300px; height:170px; right:-60px" src="/products/{{$product->image}}" alt="">
               </div>
               <div class="p-2">
                 <label>New image</label>
                 <input type="file" name="image">

               </div>

               <div class="p-2 ">
                 <input type="submit" class="btn btn-primary" value="Update">
               </div>

            </form>





          </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.footer')
    <!-- container-scroller -->
    <!-- plugins:js -->
          @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
