<!-- resources/views/cart.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #9cd1f2;
        }

        .remove-btn {
            background-color: #e74c3c;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .product-img {
            height: 100px;
        }

        .total {
            text-align: right;
            margin-top: 15px;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Your Cart</h2>

<table>
    <thead>
        <tr>
            <th>Product title</th>
            <th>Product quantity</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cartItems as $item)
            <tr>
                <td>{{ $item->product_title }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->price }}</td>
                <td><img class="product-img" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}"></td>
                <td>
                    <form method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="remove-btn">Remove Product</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="total">
    Total Price : {{ $cartItems->sum(fn($item) => $item->price * $item->quantity) }}
</div>

</body>
</html>
