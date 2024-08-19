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
      <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">
      <title>Cars For Sale </title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      <link rel="stylesheet" href="{{ asset('home/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">

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

    </style>

   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
          @include('home.header')
         <!-- end header section -->
         <!-- slider section -->

      <!-- why section -->

        <div class="card text-center">
            <div class="card-header">
                {{$product->title}}
            </div>
            <div class="card-body">
                <img src="{{ asset('product/' . $product->image) }}" class="card-img-bottom" alt="{{ $product->title }}">
            </div>
            <div class="card-footer text-muted">
                @if($product->discount_price!= null)
                <p class="card-text" style="color: blue;">Discount Price: {{$product->discount_price}}</p>
                <p class="card-text" style="text-decoration:line-through; color: red;">Price: {{$product->price}}</p>
                @else
                <p class="card-text" style="color: red;">Discount Price: {{$product->price}}</p>
                @endif
                <p class="card-text">Description: {{$product->description}}</p>
                <p class="card-text">Quantity: {{$product->quantity}}</p>
                <form action="{{url('add_cart', $product->id)}}" method="post">
                              @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                    <input type="number" value="1" min="1" style="color:black; width: 100px;"name="quantity">
                                 </div>
                                 <div class="col-mid-4">
                                 <input type="submit"class="btn btn-primary" value="Add to Cart">
                                 </div>
                              </div>
                </form>
            </div>
            </div>
      <!-- footer start -->
       @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2024 All Rights Reserved By <a href="#">WiseDevelopers</a><br>
         
            Distributed By <a href="#" target="_blank">WiseDevelopers</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      <!-- popper js -->
      <script src="{{asset('home/js/popper.min.js')}}"></script>
      <!-- bootstrap js -->
      <script src="{{asset('home/js/bootstrap.js')}}"></script>
      <!-- custom js -->
      <script src="{{asset('home/js/custom.js')}}"></script>
   </body>
</html>