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
        .form-container {
            background-color: #0e0e0e;
            color: white;
            padding: 40px;
            border-radius: 10px;
            width: 600px;
            margin: 0 auto;
            margin-top: 50px;
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="number"], select, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            background: #1c1c1c;
            color: white;
            border: 1px solid #444;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #0c6cf2;
            color: white;
            border: none;
            border-radius: 5px;
        }
        button:hover {
            background-color: #084cc0;
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
            <div class="content-wrapper">
                <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button 
                            type="button" 
                            class="btn-close" 
                            data-bs-dismiss="alert" 
                            aria-label="Close">
                        </button>
                    </div>
                @endif

                <!-- Product Add Form Start -->
                <div class="form-container">
                    <h1>Add Product</h1>
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Product Title</label>
                            <input type="text" name="title" placeholder="Write a title" required>
                        </div>

                        <div class="form-group">
                            <label>Product Description</label>
                            <input type="text" name="description" placeholder="Write a description" required>
                        </div>

                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="number" name="price" placeholder="Write a price" step="0.01" required>
                        </div>

                        <div class="form-group">
                            <label>Discount Price</label>
                            <input type="number" name="discount_price" placeholder="Write a discount if applicable" step="0.01">
                        </div>

                        <div class="form-group">
                            <label>Product Quantity</label>
                            <input type="number" name="quantity" placeholder="Write a quantity" required>
                        </div>

                        <div class="form-group">
                            <label>Product Category</label>
                            <select name="category" required>
                                <option value="">Select a category</option>

                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Product Image</label>
                            <input type="file" name="image" accept="image/*" required>
                        </div>

                        <button type="submit">Add Product</button>
                    </form>
                </div>
                <!-- Product Add Form End -->
            </div>
        </div>
    </div>
    <!-- Scripts -->
    @include('admin.script')
  </body>
</html>
