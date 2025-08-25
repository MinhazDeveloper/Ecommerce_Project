<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Category</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        <div class="container-fluid page-body-wrapper">
            @include('admin.header')

            <div class="content-wrapper">
                <div class="row mb-5">
                    <div class="col-12 text-center">
                        <h2 class="text-white mb-4">Edit Category</h2>

                        <form 
                            action="{{ route('category.update', $editCategory->id) }}" 
                            method="POST" 
                            class="d-flex justify-content-center"
                        >
                            @csrf
                            @method('PUT')

                            <input 
                                type="text" 
                                name="category_name" 
                                class="form-control w-25 me-2" 
                                placeholder="Write category name" 
                                value="{{ $editCategory->category_name }}"
                                required
                            >
                            <button 
                                type="submit" 
                                class="btn btn-outline-light"
                            >
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('admin.script')
</body>
</html>
