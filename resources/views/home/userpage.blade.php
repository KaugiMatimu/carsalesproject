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
      <title>Cars For Sale </title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style>
.slider_section {
    position: relative;
    color: #fff;
    text-align: left;
}

.slider_bg_box img {
    filter: brightness(50%);
}

.detail-box h1 {
    font-size: 48px;
    font-weight: bold;
    color: #f8b400;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    margin-bottom: 20px;
}

.detail-box p {
    font-size: 18px;
    line-height: 1.6;
    color: #f0f0f0;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    margin-bottom: 30px;
}

.btn1 {
    background-color: #f8b400;
    color: #fff;
    font-size: 18px;
    padding: 12px 30px;
    text-transform: uppercase;
    border-radius: 5px;
    text-shadow: none;
    transition: background-color 0.3s ease;
}

.btn1:hover {
    background-color: #e69900;
    color: #fff;
}

@media (max-width: 768px) {
    .detail-box h1 {
        font-size: 36px;
    }

    .detail-box p {
        font-size: 16px;
    }

    .btn1 {
        font-size: 16px;
        padding: 10px 25px;
    }
}
.comment-box {
            margin-top: 20px;
        }
        .comment {
            padding: 15px;
            margin-top: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        .reply-button {
            color: #007bff;
            cursor: pointer;
        }
        .reply-box {
            margin-left: 50px;
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <div class="hero_area">
        @include('home.header')
        @include('home.slider')
    </div>
    @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
       @include('home.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
       @include('home.products')
    
    <div class="container">
        <form action="{{url('add_comment')}}" method="post">
            @csrf
            <!-- Comment Textbox -->
            <h2 style="text-align: center;">All Comments</h2>
            <div class="comment-box">
                <textarea class="form-control" rows="3" name="comment" placeholder="Write your comment here..."></textarea>
                <input type="submit" class="btn btn-primary mt-2" value="Comment">
            </div>

            <!-- Existing Comments -->
            @foreach($comments as $comment)
            <div class="comment">
                <input type="hidden" class="commentId" value="{{$comment->id}}">
                <b>{{$comment->name}}</b>
                <p>{{$comment->comment}}</p>
                <span class="reply-button">Reply</span>

                <!-- Existing Replies -->
                @foreach($reply as $rep)
                @if($rep ->comment_id == $comment ->id)
                <div class="reply-box">
                    <b>{{$rep->name}}</b>
                    <p>{{$rep->reply}}</p>
                    <span class="reply-button">Reply</span>
                </div>
                @endif
                @endforeach
            </div>
            @endforeach
        </form>
    </div>
    @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
       @include('home.clients')
      <!-- end client section -->
    <!-- Include your footer and scripts -->
    @include('home.footer')
      <div class="cpy_">
         <p class="mx-auto">© 2024 All Rights Reserved By <a href="#">WiseDevelopers</a><br>
         
            Distributed By <a href="#" target="_blank">WiseDevelopers</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.reply-button').click(function () {
                let replyBox = $(this).siblings('.reply-box');
                let commentId = $(this).closest('.comment').find('.commentId').val();

                if (replyBox.children().length === 0) {
                    replyBox.append(`
                    <form action="{{url('add_reply')}}" method="POST">
                    @csrf
                        <input type="hidden" name="comment_id" value="${commentId}">
                        <textarea class="form-control" rows="2" name="reply" placeholder="Write your reply here..."></textarea>
                        <input type="submit" class="btn btn-secondary mt-2" value="Reply">
                    </form>
                    `);
                } else {
                    replyBox.empty();
                }
            });
        });
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
</body>
</html>
