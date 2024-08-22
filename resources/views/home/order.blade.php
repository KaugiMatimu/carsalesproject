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

    </style>

   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
          @include('home.header')

      <!-- end client section -->
      <!-- footer start -->
      <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Product Title</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Delivery Status</th>
      <th scope="col">Image</th>
      <th scope="col">Cancel Order</th>
    </tr>
  </thead>
  <tbody>
    @foreach($order as $order)
    <tr>
      <th scope="row">{{$order->product_title}}</th>
      <td>{{$order->quantity}}</td>
      <td>ksh: {{$order->price}}</td>
      <td>{{$order->payment_status}}</td>
      <td>{{$order->delivery_status}}</td>
      <td><img src="product/{{$order->image}}" alt=""></td>
      @if($order ->delivery_status == 'processing')
      <td><a class="btn btn-danger" onclick="return confirm('Are You Sure You Want To Cancel This Order!!!')" href="{{url('cancel_order', $order->id)}}">Cancel Order</a></td>
      @else
      <td style="color: blue;">Not Allowed</td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
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