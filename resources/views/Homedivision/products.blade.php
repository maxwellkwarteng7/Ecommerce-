<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>
         </h2>
      </div>
      <div class="row">
        {{-- product card  --}}

        @forelse($products as $product)
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{url('view_products',$product->id)}}" class="option1">
                      View
                     </a>
                     <form class="" action="{{url('/addcart',$product->id)}}" method="post" class="form-control">
                       @csrf

                       <input type="number" name="quantity" value="1" min="1">
                       <input type="submit"  value="Add to cart">
                     </form>
                  </div>
               </div>
               <div class="img-box">
                  <img style="width:300px ; height:200px" src="products/{{$product->image}}" alt="">
               </div>
               <div class="detail-box">
                 <h6>
                   {{ \Illuminate\Support\Str::limit($product->name, 15, $end='..') }}
                 </h6>
                  @if($product->discount_price!=null)
                  <h6 style="text-decoration:line-through; color:red" >
                    Ghs {{$product->price}}
                  </h6>
                  <h6 style="color:blue">
                    Ghs {{$product->discount_price}}
                  </h6>
                @else
                  <h6 style="color:blue" >
                    Ghs {{$product->price}}
                  </h6>
                @endif
               </div>
            </div>
         </div>
       @empty
         <div style="margin:auto;padding:20px;">
           <p style="font-family:verdana;">No match found !!</p>
         </div>


       @endforelse
         {{-- End of product card --}}
       </div>
       <div class="p-2">
         {{$products->links()}}
       </div>

   </div>

</section>
