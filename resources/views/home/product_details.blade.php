<!DOCTYPE html>
<html>
<head>
    <title>{{ $product->name }}</title>
    <style>
        .product-container {
            text-align: center;
            margin-top: 50px;
        }

        .product-image img {
            width: 300px;
            height: auto;
        }

        .add-to-cart-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }

        .add-to-cart-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="product-container">
        <div class="product-image">
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
        </div>
        <h2>{{ $product->title }}</h2>
        <p><strong>Price</strong><br>${{ $product->price }}</p>
        <p>Product Category: {{ $product->category }}</p>
        <p>Product Category: {{ $product->description }}</p>
        <!-- <p>Product Details: {{ $product->ram }} RAM, {{ $product->graphics }} Graphics Card</p> -->
        <p>Available Quantity: {{ $product->quantity }}</p>
        <button class="add-to-cart-btn">Add to Cart</button>
    </div>

</body>
</html>
