@extends('layouts.entrepreneur_layout')
@section('entrepreneur_content')

    <main id="main" class="main">
        <div class="container-fluid">
              <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <!-- add new product modal start -->
                    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="#" method="POST" id="add_product_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body p-4 bg-light">
                                        <div class="my-3">
                                            <label for="name">Product Name</label>
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Product name" required>
                                        </div>
                                        <div class="my-3">
                                            <label for="category">Category</label>
                                            <input type="text" id="category" name="category" class="form-control" placeholder="Category" required>
                                        </div>
                                        <div class="my-3">
                                            <label for="details">Details</label>
                                            <input type="text" name="details" id="details" class="form-control" placeholder="Details" required>
                                        </div>
                                        <div class="my-3">
                                            <label for="image">Select Image</label>
                                            <input type="file" name="image" id="image" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="add_product_btn" class="btn btn-primary">Add Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- add new product modal end -->


                    {{-- edit employee modal start --}}
                    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="#" method="POST" id="edit_product_form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="product_id" id="product_id">
                                    <input type="hidden" name="product_image" id="product_image">
                                    <div class="modal-body p-4 bg-light">
                                        <div class="my-3">
                                            <label for="edit_name">Product Name</label>
                                            <input type="text" name="name" id="edit_name" class="form-control" placeholder="production name" required>
                                        </div>
                                        <div class="my-3">
                                            <label for="edit_category">Category</label>
                                            <input type="text" id="edit_category" name="category" class="form-control" placeholder="category" required>
                                        </div>
                                        <div class="my-3">
                                            <label for="edit_details">Details</label>
                                            <input type="text" name="details" id="edit_details" class="form-control" placeholder="details" required>
                                        </div>
                                        <div class="my-3">
                                            <label for="image">Select Image</label>
                                            <input type="file" name="image" id="edit_image" class="form-control">
                                        </div>
                                        <div class="mt-2" id="image">

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="edit_product_btn" class="btn btn-success">Update Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- edit employee modal end --}}
            <div class="row ">
                <div class="col-sm-12 col-md-12">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="text-dark">Manage Products</h3>
                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addProductModal"><i class="bi-plus-circle me-2"></i>Product</button>
                        </div>
                        <div class="card-body" id="show_all_products">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
{{-- this is ajax script coding --}}
@include('entrepreneur.production.production_ajax')
@endsection





