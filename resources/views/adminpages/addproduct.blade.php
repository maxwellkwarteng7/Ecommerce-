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
            <nav class="navbar p-0 fixed-top d-flex flex-row">
              <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg" alt="logo" /></a>
              </div>
              <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                  <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav w-100">
                  <li class="nav-item w-100">
                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{url('/searchProduct')}}" method="post">
                      @csrf
                      <input id="textcolor" type="text" name="search" class="form-control" placeholder="Search product">
                      <input  class="btn btn-outline-primary" type="submit" value="search">
                    </form>
                  </li>
                </ul>
                <ul class="navbar-nav navbar-nav-right">
                  <li class="nav-item dropdown d-none d-lg-block">
                    <a class="nav-link btn btn-success create-new-button" id="createbuttonDropdown" data-bs-toggle="dropdown" aria-expanded="false" href="#">+ Create New Project</a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="createbuttonDropdown">
                      <h6 class="p-3 mb-0">Projects</h6>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                          <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-file-outline text-primary"></i>
                          </div>
                        </div>
                        <div class="preview-item-content">
                          <p class="preview-subject ellipsis mb-1">Software Development</p>
                        </div>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                          <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-web text-info"></i>
                          </div>
                        </div>
                        <div class="preview-item-content">
                          <p class="preview-subject ellipsis mb-1">UI Development</p>
                        </div>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                          <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-layers text-danger"></i>
                          </div>
                        </div>
                        <div class="preview-item-content">
                          <p class="preview-subject ellipsis mb-1">Software Testing</p>
                        </div>
                      </a>
                      <div class="dropdown-divider"></div>
                      <p class="p-3 mb-0 text-center">See all projects</p>
                    </div>
                  </li>
                  <li class="nav-item nav-settings d-none d-lg-block">
                    <a class="nav-link" href="#">
                      <i class="mdi mdi-view-grid"></i>
                    </a>
                  </li>
                  <li class="nav-item dropdown border-left">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="mdi mdi-email"></i>
                      <span class="count bg-success"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                      <h6 class="p-3 mb-0">Messages</h6>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                          <img src="admin/assets/images/faces/face4.jpg" alt="image" class="rounded-circle profile-pic">
                        </div>
                        <div class="preview-item-content">
                          <p class="preview-subject ellipsis mb-1">Mark send you a message</p>
                          <p class="text-muted mb-0"> 1 Minutes ago </p>
                        </div>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                          <img src="admin/assets/images/faces/face2.jpg" alt="image" class="rounded-circle profile-pic">
                        </div>
                        <div class="preview-item-content">
                          <p class="preview-subject ellipsis mb-1">Cregh send you a message</p>
                          <p class="text-muted mb-0"> 15 Minutes ago </p>
                        </div>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                          <img src="admin/assets/images/faces/face3.jpg" alt="image" class="rounded-circle profile-pic">
                        </div>
                        <div class="preview-item-content">
                          <p class="preview-subject ellipsis mb-1">Profile picture updated</p>
                          <p class="text-muted mb-0"> 18 Minutes ago </p>
                        </div>
                      </a>
                      <div class="dropdown-divider"></div>
                      <p class="p-3 mb-0 text-center">4 new messages</p>
                    </div>
                  </li>
                  <li class="nav-item dropdown border-left">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                      <i class="mdi mdi-bell"></i>
                      <span class="count bg-danger"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                      <h6 class="p-3 mb-0">Notifications</h6>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                          <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-calendar text-success"></i>
                          </div>
                        </div>
                        <div class="preview-item-content">
                          <p class="preview-subject mb-1">Event today</p>
                          <p class="text-muted ellipsis mb-0"> Just a reminder that you have an event today </p>
                        </div>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                          <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-settings text-danger"></i>
                          </div>
                        </div>
                        <div class="preview-item-content">
                          <p class="preview-subject mb-1">Settings</p>
                          <p class="text-muted ellipsis mb-0"> Update dashboard </p>
                        </div>
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                          <div class="preview-icon bg-dark rounded-circle">
                            <i class="mdi mdi-link-variant text-warning"></i>
                          </div>
                        </div>
                        <div class="preview-item-content">
                          <p class="preview-subject mb-1">Launch Admin</p>
                          <p class="text-muted ellipsis mb-0"> New admin wow! </p>
                        </div>
                      </a>
                      <div class="dropdown-divider"></div>
                      <p class="p-3 mb-0 text-center">See all notifications</p>
                    </div>
                  </li>
                  <li>
                    <x-app-layout>

                    </x-app-layout>
                  </li>
                </ul>

              </div>
            </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @include('inc.messages')

            {{-- form for adding product --}}
            <form action="{{url('/additem')}}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="p-2 text-center">
                  <h1>Add Product</h1>
                </div>
               <div class="p-2 text-center ">
                 <label>Product name</label>
                 <input type="text" class="text-dark" name="name" placeholder="Enter product name" required>
               </div>

               <div class="p-2 text-center">
                 <label>Description</label>
                 <input type="text" class="text-dark" name="description" placeholder="Enter  description" required>
               </div>

               <div class="p-2 text-center">
                 <label>Price</label>
                 <input type="number" class="text-dark" name="price" placeholder="Product price" required>
               </div>

               <div class="p-2 text-center">
                 <label>Quantity</label>
                 <input type="number" class="text-dark" name="quantity" placeholder="quantity of product" required>
               </div>

               <div class="p-2 text-center">
                 <label> Discount price</label>
                 <input type="text" class="text-dark" name="dis_price" placeholder="Enter discount price">
               </div>

               <div class="p-2 text-center">
                 <label>Category</label>
                 <select class="text-dark" name="category" required>
                   <option value="" selected>Choose category</option>
                   @foreach($categories as $category)
                   <option value="{{$category->name}}">{{$category->name}}</option>
                 @endforeach
                 </select>
               </div>


               <div class="p-2 text-center">
                 <label>Image</label>
                 <input type="file" name="image" required>
               </div>

               <div class="p-2 text-center">
                 <input type="submit" class="btn btn-primary" value="Add product">
               </div>

            </form>

            <div class="row p-3 ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Products</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Product name  </th>
                            <th>  Price   </th>
                            <th>  Description   </th>
                            <th>  Quantity   </th>
                            <th>  Discount Price  </th>
                            <th>  Category   </th>
                            <th>  Image   </th>
                            <th> Action</th>
                            <th> Action</th>


                          </tr>
                        </thead>
                        <tbody>
                          @if(count($products)>0)
                          @foreach($products as $product)
                          <tr>
                            <td class="p-3">
                              {{$product->name}}
                            </td>
                            <td class="p-3">
                              {{$product->price}}
                            </td>
                            <td class="p-3">
                              {{$product->description}}
                            </td>
                            <td class="p-3">
                              {{$product->quantity}}
                            </td>
                            @if(is_null($product->discount_price))
                              <td class="p-3"> null</td>
                            @else
                            <td class="p-3">
                              {{$product->discount_price}}
                            </td>
                          @endif

                            <td class="p-3">
                              {{$product->category}}
                            </td>
                            <td class="p-3">
                              <img src="/products/{{$product->image}}" alt="">
                            </td>
                            <td class="p-3">
                              <a onclick="return confirm('Are you sure you wan t to delete?')" class="btn btn-danger" href="{{url('/deleteproduct',$product->id)}}">Delete</a>
                            </td>
                            <td class="p-3">
                              <a class="btn btn-primary" href="{{url('/editproduct',$product->id)}}">Edit</a>
                            </td>
                          </tr>
                        @endforeach
                      @else
                        <td>
                          No product added
                        </td>
                      @endif
                      </tbody>
                      </table>
                    {{$products->links()}}
                    </div>
                  </div>
                </div>
              </div>
            </div>



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
