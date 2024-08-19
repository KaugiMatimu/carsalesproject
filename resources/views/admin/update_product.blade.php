<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <style>
        .h2_class{
            text-align: center;
            padding-top: 40px;
        }
    </style>
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      
      <!-- partial:partials/_navbar.html -->
      @include('admin.header')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper d-flex flex-column align-items-center">
        @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
            </div>

            @endif
            <!-- Caption -->
            <h2 class="mb-4 text-center text-white">Update Product</h2>
            
            <!-- Form -->
            <form class="needs-validation p-4 bg-dark rounded" action="{{url('update_product_confirm', $product->id)}}" method="POST" novalidate style="width: 100%; max-width: 500px;" enctype="multipart/form-data">
            @csrf    
            <div class="form-row mb-3">
                    <div class="col-md-12">
                        <label for="productName" class="text-white">Product Name</label>
                        <input type="text" class="form-control bg-light text-dark border-light" name="title" 
                        id="productName" placeholder="Write Product Name" required value={{$product->title}}>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-md-12">
                        <label for="productDescription" class="text-white">Product Description</label>
                        <input type="text" class="form-control bg-light text-dark border-light" name="description" 
                        id="productDescription" placeholder="Write Product Description" required value={{$product->description}}>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-md-12">
                        <label for="productPrice" class="text-white">Product Price</label>
                        <input type="number" class="form-control bg-light text-dark border-light" name="price" min="0"
                         id="productPrice" placeholder="Write Product Price" required value={{$product->price}}>
                    </div>
                </div>
                <div class="form-row mb-3">
                    <div class="col-md-12">
                        <label for="productQuantity" class="text-white">Quantity</label>
                        <input type="number" class="form-control bg-light text-dark border-light" name="quantity"
                         id="productQuantity" placeholder="Enter Product Quantity" required value={{$product->quantity}}>
                    </div>
                </div>
                <div class="form-row mb-3">
                <div class="col-md-12">
                    <label for="discountPrice" class="text-white">Discount Price</label>
                    <input type="text" class="form-control bg-light text-dark border-light"name="discount_price"id="discountPrice"placeholder="Discount Price" 
                        value={{$product->discount_price}}>
                </div>
            </div>

                <div class="form-row mb-3">
                    <div class="col-md-12">
                        <label for="productCategory" class="text-white">Category</label>
                        <select class="custom-select bg-light text-dark border-light" name="category" id="productCategory" required>
                            <option selected="" value={{$product->category}}>{{$product->category}}</option>
                            @foreach($categories as $category)
                            <option>{{ $category->category_name}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row mb-4">
                    <div class="col-md-12">
                        <label for="productImage" class="text-white">Current Product Image</label>
                        <img src="/product/{{$product->image}}">
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="col-md-12">
                        <label for="productImage" class="text-white">Product Image</label>
                        <input type="file" class="custom-file-input" name="image" id="productImage">
                        <label class="custom-file-label text-white bg-primary" for="productImage">Choose file</label>
                    </div>
                </div>
                <button class="btn btn-primary w-100" type="submit">Update</button>
            </form>
        </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin/assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin/assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin/assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('admin/assets/js/misc.js') }}"></script>
    <script src="{{ asset('admin/assets/js/settings.js') }}"></script>
    <script src="{{ asset('admin/assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
  </body>
</html>
