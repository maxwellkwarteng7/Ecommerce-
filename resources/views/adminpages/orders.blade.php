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
       .body{
         text-align: center;
         padding:30px;
       }
       #font{
         font-size: 30px;
       }
       #textcolor {
         color:white;
       }
       </style>
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
         @include('admin.sidebar')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
              <!-- partial:partials/_navbar.html -->
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
                      <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{url('/searchOrders')}}" method="post">
                        @csrf
                        <input id="textcolor" type="text" name="search" class="form-control" placeholder="Search orders">
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


            <div class="row ">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Orders</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Name  </th>
                            <th> Phone </th>
                            <th> Email </th>
                            <th> Address</th>
                            <th> Product </th>
                            <th> Price </th>
                            <th> Quantity </th>
                            <th> Image </th>
                            <th> Payment status </th>
                            <th> Delivery status </th>
                            <th>Delivered</th>
                            <th>Print pdf</th>
                            <th>Send email</th>




                          </tr>
                        </thead>
                        <tbody>

                          @forelse($orders as $order)
                          <tr align="center">
                            <td class="p-2">
                              {{$order->name}}
                            </td>
                            <td class="p-2">
                              {{$order->phone}}
                            </td>
                            <td class="p-2">
                              {{$order->email}}
                            </td>
                            <td class="p-2">
                              {{$order->address}}
                            </td>
                            <td class="p-2">
                              {{$order->product_name}}
                            </td>
                            <td class="p-2">
                              {{$order->product_price}}
                            </td>
                            <td class="p-2">
                              {{$order->quantity}}
                            </td>
                            <td class="p-2">
                              <img style="width:200px; height:90px" src="/products/{{$order->product_image}}" alt="">
                            </td>
                            <td class="p-2">
                              {{$order->payment_status}}
                            </td>
                            <td class="p-2">
                              {{$order->delivery_status}}
                            </td>

                            <td>
                              @if($order->delivery_status=="Processing")
                                <a onclick="return confirm('Are you sure the product is delivered ?')" href="{{url('/delivered',$order->id)}}" class="btn btn-primary btn-sm">delivered</a>

                              @else
                                <h1 class="btn btn-success btn-sm">delivered</h1>
                              @endif
                            </td>
                            <td>
                              <a class="btn btn-secondary" href="{{url('print_order',$order->id)}}">Print</a>
                            </td>
                            <td>
                              <a href="{{url('/send_email',$order->id)}}" class="btn btn-info btn-sm">Email</a>
                            </td>

                          </tr>

                        @empty
                          <tr >
                            <td colspan="16">
                              No data found!!
                            </td>
                          </tr>

                        @endforelse

                      </tbody>
                      </table>
                      <div class="p-3">
                        {{$orders->links()}}
                      </div>
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
