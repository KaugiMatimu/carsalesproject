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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

         /* Style for images */
         .product-image {
             width: 200px;
             height: 200px;
             object-fit: cover;
             border-radius: 8px;
             box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
             transition: transform 0.3s ease, box-shadow 0.3s ease;
         }

         .product-image:hover {
             transform: scale(1.1);
             box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
         }
      </style>
   </head>
   <body>
   @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section starts -->
         @include('home.header')

         @if(session()->has('message'))
            <div class="alert alert-success">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
               {{ session()->get('message') }}
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
            <?php $totalprice = 0; ?>
            @foreach($cart as $cart)
            <tbody>
               <tr>
                  <th>{{ $cart->product_title }}</th>
                  <td>{{ $cart->quantity }}</td>
                  <td>Ksh: {{ $cart->price }}</td>
                  <td><img src="product/{{ $cart->image }}" class="product-image" alt="{{ $cart->product_title }}"></td>
                  <td><a href="{{ url('remove_cart', $cart->id) }}" onclick="confirmation(event)" class="btn btn-danger">Remove</a></td>
               </tr>
            </tbody>
            <?php $totalprice += $cart->price; ?>
            @endforeach
         </table>
         
         <h6 style="text-align:center;">Total Price: Ksh: {{ $totalprice }}</h6>
         
         <div class="order-container">
            <h1 style="text-align:center;">Proceed to Order</h1>
            <div class="button-group">
               <a href="{{ url('pay_with_mpesa') }}" class="btn btn-danger">Pay With M-pesa</a>
               <a href="{{ url('cash_pay') }}" class="btn btn-danger">Cash On Delivery</a>
               <a href="{{ url('stripe', $totalprice) }}" class="btn btn-danger">Pay With Card</a>
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
         <script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to cancel this product",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {


                 
                window.location.href = urlToRedirect;
               
            }  


        });

        
    }
</script>
         <!-- jQuery -->
         <script src="home/js/jquery-3.4.1.min.js"></script>
         <!-- popper js -->
         <script src="home/js/popper.min.js"></script>
         <!-- bootstrap js -->
         <script src="home/js/bootstrap.js"></script>
         <!-- custom js -->
         <script src="home/js/custom.js"></script>
   </body>
</html>
