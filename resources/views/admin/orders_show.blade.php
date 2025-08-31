<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            color: white;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: black;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #444;
        }

        th {
            background-color: #63c7f0;
            color: black;
        }

        td img {
            width: 100px;
            height: auto;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <h1>All Orders</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->product_title }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->delivery_status }}</td>
                    <td>
                        <img src="{{ asset('storage/product/'.$order->image) }}" alt="product image">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
