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
       label{
         display: inline-block;
         width: 150px;
       }
       </style>
       <base href="/public">
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
         @include('admin.sidebar')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
              <!-- partial:partials/_navbar.html -->
              @include('admin.navbar')


        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
              @include('inc.messages')

              <h3 class="text-center">Send mail to {{$order->email}}</h3>

              <form class="p-3 text-center" action="{{url('send_user_email',$order->id)}}" method="post">
                @csrf
                <div class="p-2 text-center">
                  <label>Email greeting</label>
                  <input type="text" name="greeting"class="text-dark">
                </div>
                <div class="p-2 text-center">
                  <label>Email firstline</label>
                  <input type="text" name="firstline"class="text-dark">
                </div>
                <div class="p-2 text-center">
                  <label>Email body</label>
                  <input type="text" name="body"class="text-dark">
                </div>
                <div class="p-2 text-center">
                  <label>Email button name</label>
                  <input type="text" name="button"class="text-dark">
                </div>
                <div class="p-2 text-center">
                  <label>Email url</label>
                  <input type="text" name="url"
                  class="text-dark">
                </div>
                <div class="p-2 text-center">
                  <label>Email last line</label>
                  <input type="text" name="lastline"class="text-dark">
                </div>
                <div class="p-2 text-center">

                  <input class="btn btn-primary" type="submit" value="send mail">
                </div>
              </form>


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
