<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
</head>
<body>
    <h1>Order Details</h1>
   Client Name: <p>{{$order->name}}</p>
   Client Email: <p>{{$order->email}}</p>
   Client Address: <p>{{$order->address}}</p>
   Client Phone: <p>{{$order->phone}}</p>
   Client Id: <p>{{$order->user_id}}</p>
   Product Name: <p>{{$order->product_title}}</p>
   Product Price: <p>{{$order->price}}</p>
   Quantity Product: <p>{{$order->quantity}}</p>
   Payment Status: <p>{{$order-> payment_status}}</p>
   Delivery Status: <p>{{$order-> delivery_status}}</p>
   <!-- Product Image: <p><img src="product/{{$order->image}}"></p> -->
</body>
</html>