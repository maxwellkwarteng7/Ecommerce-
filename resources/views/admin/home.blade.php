<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
   @include('admin.css')
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

            {{-- boxes --}}
            @include('admin.boxes')
            {{-- end of boxes  --}}

            {{--  table and sidebox  --}}

            {{-- end of table and side box  --}}

            {{-- small boxes  --}}
            @include('admin.smallboxes')
            {{-- end of small boxes --}}

            {{-- table  --}}


            {{-- End of table  --}}
            
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          @include('admin.footer')
    <!-- container-scroller -->
    <!-- plugins:js -->
          @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
