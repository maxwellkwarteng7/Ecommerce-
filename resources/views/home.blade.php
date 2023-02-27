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
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="css/responsive.css" rel="stylesheet" />
      <style media="screen">
          .group {
    display: flex;
    line-height: 28px;
    align-items: center;
    position: relative;
    max-width: 190px;
    }

    .input {
    width: 100%;
    height: 40px;
    line-height: 28px;
    padding: 0 1rem;
    padding-left: 2.5rem;
    border: 2px solid transparent;
    border-radius: 8px;
    outline: none;
    background-color: #f3f3f4;
    color: #0d0c22;
    transition: .3s ease;
    }

    .input::placeholder {
    color: #9e9ea7;
    }

    .input:focus, input:hover {
    outline: none;
    border-color: rgba(234,76,137,0.4);
    background-color: #fff;
    box-shadow: 0 0 0 4px rgb(234 76 137 / 10%);
    }

    .icon {
    position: absolute;
    left: 0.5rem;
    bottom:2rem;
    fill: #9e9ea7;
    width: 1rem;
    height: 1rem;
    }
      </style>
   </head>
   <body>
      <div class="hero_area">
        @include('sweetalert::alert')
         <!-- header section strats -->
         @include('Homedivision.navbar')

         @include('inc.messages')

         <!-- end header section -->
         <!-- slider section -->
         @include('Homedivision.slider')

      <!-- why section -->
      @include('Homedivision.why')

      <!-- end why section -->

      <!-- arrival section -->
      @include('Homedivision.arrival')
      <!-- end arrival section -->

      <!-- product section -->
      <div id="search"  class="p-3 text-center" style="margin:auto; display:block;">
        <form  action="{{url('/search_products')}}" method="post">
          @csrf
          <div class="group">
            <svg class="icon" aria-hidden="true" viewBox="0 0 24 24"><g><path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path></g></svg>
            <input placeholder="Search" type="search"  class="input text-center" name="searchProduct">
          </div>
          <input type="submit" class="btn btn-primary btn-sm"  value="search">
        </form>
      </div>
      @include('Homedivision.products')
      <!-- end product section -->

      {{-- comment section --}}
      <div class="container">
        <div class="">
          <h1 class="text-center"><b style="font-size:20px">Comments</b></h1>
          {{-- comment section --}}
          <div class="p-3 text-center ">
            <form class="form_control" action="{{url('/add_comment')}}" method="post">
              @csrf
              <div class="text-center">

                <textarea style="height:150px; width:50%" name="comment" placeholder="write something here"></textarea>
                <button type="submit "> comment</button>
              </div>
            </form>
          </div>
          {{-- showing all the comments section --}}
          <div style="padding-left:20%; padding-bottom:20px;">
            <h2 style="font-size:20px;padding-bottom:20px;">All Comments</h2>
            @foreach($comments as $comment)
            <div>
              {{-- comments start here  --}}
            <div class="">
              <b>{{$comment->name}}</b>
              <p>{{$comment->comment}}</p>
              <small>{{$comment->created_at}}</small>
              <a style="padding-left:15px; color:blue;" href="javascript::void(0);" style="color:blue; padding-top:10px;" onclick="reply(this)" data-commentid="{{$comment->id}}">Reply</a>
            </div>
            {{-- comments end here  --}}

            {{-- reply to comments --}}


              <div class="" style="">
                @foreach($replies as $reply)
                @if($comment->id == $reply->comment_id)
                <div style="color:green; padding-left:15px">
                  <b>{{$reply->name}}</b>
                  <p>{{$reply->reply}}</p>
                   <p>{{$reply->created_at}}</p>
                  <a style="padding-left:15px; color:blue;" href="javascript::void(0);" style="color:blue; padding-top:10px;" onclick="reply(this)" data-commentid="{{$comment->id}}">Reply</a>
                </div>
              @endif
              @endforeach
            </div>
          @endforeach
          {{-- reply to comments end here --}}


            {{-- reply section --}}

            <div style="display:none;" class="replyDiv">
              <form class="" action="{{url('/reply_comment')}}" method="post">
                @csrf
                <input type="number" name="comment_id" id="commentId" hidden="">
                <textarea  placeholder="say something" name="reply" style="width:50%; height:100px;"
                ></textarea>
                <br>
                <button type="submit" class="btn btn-outline-primary btn-sm">reply</button>
                <a style="padding-left:15px;" href="javascript::void(0);" class="btn btn-danger btn-sm" onclick="reply_close(this)">close</a>
              </form>
            </div>
          </div>

            {{-- End of reply section  --}}
          </div>
        </div>

      </div>




      {{-- comment section end here  --}}

      <!-- subscribe section -->
      @include('Homedivision.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('Homedivision.testimonial')
      <!-- end client section -->
      <!-- footer start -->
      @include('Homedivision.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <script type="text/javascript">
      // caller calls the reply function in the page
        function reply(caller){
           document.getElementById('commentId').value=$(caller).attr('data-commentid');
      //each time the reply button is clicked insert the information is the replydiv and show it .


          $('.replyDiv').insertAfter($(caller));
          $('.replyDiv').show();

          // we passed the comment id to a variable in inside the comment for each loop .

          // we then came to the reply div to receive the comment id inside an input field

          // but then we need to give and id to the input field to which we will pass the comment id from through the javascript code .

          // above is the javascript code
          // explanation .. we are passing an information to an html document which has an id="commentId" and and we are getting the value from the caller fucntion to which we passed the value we want to give to the html document with the id we mentioned inside our javascript code ..and inside where we can locate the caller fucntion we can get the comment id from a variable we named called comment_id //




        }

        function reply_close(caller)
        {
          $('.replyDiv').hide();
        }
      </script>

      <script>
     document.addEventListener("DOMContentLoaded", function(event) {
         var scrollpos = localStorage.getItem('scrollpos');
         if (scrollpos) window.scrollTo(0, scrollpos);
     });

     window.onbeforeunload = function(e) {
         localStorage.setItem('scrollpos', window.scrollY);
     };
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
