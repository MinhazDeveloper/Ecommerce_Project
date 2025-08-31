<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background-color: white;
            color: #000;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 30px;
        }

        p {
            font-size: 18px;
            line-height: 1.8;
        }

        span.label {
            font-weight: bold;
        }

        span.value {
            font-weight: normal;
        }
    </style>
</head>
<body>
    <h1>Order Details</h1>

    <p><span class="label">Customer Name :</span> <span class="value">{{ $order->name }}</span></p>
    <p><span class="label">Customer email :</span> <span class="value">{{ $order->email }}</span></p>
    <p><span class="label">Customer phone :</span> <span class="value">{{ $order->phone }}</span></p>
    <p><span class="label">Customer address :</span> <span class="value">{{ $order->address }}</span></p>
    <p><span class="label">Customer Id :</span> <span class="value">{{ $order->user_id }}</span></p>
    <p><span class="label">Product Name :</span> <span class="value">{{ $order->product_title }}</span></p>
    <p><span class="label">Product price :</span> <span class="value">{{ $order->price }}</span></p>
    <p><span class="label">Product Quantity :</span> <span class="value">{{ $order->quantity }}</span></p>
</body>
</html>
