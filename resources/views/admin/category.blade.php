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

                <!-- Add/Edit Category Section -->
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">
                            {{ isset($editCategory) ? 'Edit Category' : 'Add Category' }}
                        </h2>

                        <form 
                            action="{{ isset($editCategory) ? route('category.update', $editCategory->id) : route('category.add') }}" 
                            method="POST" 
                            class="d-flex justify-content-center"
                        >
                            @csrf
                            @if(isset($editCategory))
                                @method('PUT')
                            @endif

                            <input 
                                type="text" 
                                name="category_name" 
                                class="form-control w-25 me-2" 
                                placeholder="Write category name" 
                                value="{{ isset($editCategory) ? $editCategory->name : '' }}"
                                required
                            >
                            <button 
                                type="submit" 
                                class="btn btn-outline-light"
                            >
                                {{ isset($editCategory) ? 'Update' : 'Add Category' }}
                            </button>
                        </form>
                    </div>
                </div>
                <!-- End Add/Edit Category Section -->

                <!-- Category Table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-dark text-white">
                            <div class="card-body">
                                <h4 class="card-title">Category List</h4>
                                <div class="table-responsive">
                                    <table class="table text-white">
                                        <thead>
                                            <tr>
                                                <th>Catagory Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td>{{ $category->category_name }}</td>
                                                    <td class="d-flex gap-2" ">
                                                        <!-- Edit -->
                                                        <a style="margin-right: 10px";
                                                            href="{{ route('category.edit', $category->id) }}" 
                                                            class="btn btn-warning btn-sm"
                                                        >
                                                            Edit
                                                        </a>

                                                        <!-- Delete -->
                                                        <form 
                                                            action="{{ route('category.delete', $category->id) }}" 
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this category?');"
                                                        >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    @if ($categories->isEmpty())
                                        <p class="text-muted mt-3">No categories found.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Category Table -->

            </div>
            <!-- End Content -->

        </div>
        <!-- End Main Wrapper -->
    </div>
    <!-- End Container Scroller -->

    <!-- Scripts -->
    @include('admin.script')
    </body>



</html>