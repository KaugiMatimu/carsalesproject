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
<style>
        .order-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .button-group {
            display: flex;
            justify-content: center;
            gap: 15px; /* Space between buttons */
        }
        .button-group a {
            width: 200px; /* Fixed width for each button */
        }
    </style>

   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
          @include('home.header')
          @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
            </div>

            @endif
         <!-- end header section -->
      <table class="table table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Product Title</th>
      <th scope="col">Product Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php $totalprice=0; ?>
  @foreach($cart as $cart)
  <tbody>
    <tr>
      <th>{{$cart->product_title}}</th>
      <td>{{$cart->quantity}}</td>
      <td>Ksh: {{$cart->price}}</td>
      <td><img src ="product/{{$cart->image}}"></td>
      <td><a href="{{url('remove_cart', $cart->id)}}" onclick="return confirm('Are You Sure You Want To Remove This From Cart?')" class="btn btn-danger">Remove</td>
    </tr>
  </tbody>
  <?php $totalprice = $totalprice + $cart->price; ?>
  @endforeach
</table>
<h6 style="text-align:center;">Total Price:  Ksh: {{$totalprice}}</h6>
<div class="order-container">
        <h1 style="text-align:center;">Proceed to Order</h1>
        <div class="button-group">
            <a href="{{url('pay_with_mpesa')}}" class="btn btn-danger">Pay With M-pesa</a>
            <a href="{{url('cash_pay')}}" class="btn btn-danger">Cash On Delivery</a>
            <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay With Card</a>
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
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>