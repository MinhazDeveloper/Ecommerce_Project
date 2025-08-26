<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" />

    <style>
        .center {
            margin: auto;
            width: 90%;
            text-align: center;
            margin-top: 40px;
            border: 2px solid white;
        }
        .center th, .center td {
            padding: 10px;
            border: 1px solid white;
        }
        .center th {
            background-color: #222;
            color: white;
        }
        .center td {
            background-color: #111;
            color: white;
        }
        .product-image {
            width: 100px;
            height: auto;
        }
        .title {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            padding-top: 20px;
            color: white;
        }
    </style>
  </head>

  <body>
    <div class="container-scroller">
      <!-- Sidebar -->
      @include('admin.sidebar')

      <!-- Main Wrapper -->
      <div class="container-fluid page-body-wrapper">
        <!-- Navbar -->
        @include('admin.header')

        <!-- Content -->
        <div class="main-panel">
          <div class="content-wrapper">
            <h2 class="title">All Products</h2>
            <table class="center">
              <thead>
                <tr>
                  <th>Product Title</th>
                  <th>Description</th>
                  <th>Quantity</th>
                  <th>Category</th>
                  <th>Price</th>
                  <th>Discount Price</th>
                  <th>Product Image</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                  <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount_price }}</td>
                    <td>
                      <img class="product-image" src="/product/{{ $product->image }}" alt="{{ $product->title }}">
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- End Content -->

      </div>
      <!-- End Main Wrapper -->
    </div>

    <!-- Scripts -->
    <!-- @include('admin.script') -->
  </body>
</html>
