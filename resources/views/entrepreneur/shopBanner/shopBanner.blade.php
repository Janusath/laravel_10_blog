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
                    <div class="modal fade" id="addShopBannerModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Shop Banner</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="#" method="POST" id="add_shop_banner_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body p-4 bg-light">

                                        <div class="my-3">
                                            <label for="description">Description</label>
                                            <input type="text" name="description" id="description" class="form-control" placeholder="Details" required>
                                        </div>
                                        <div class="my-3">
                                            <label for="image">Select Image</label>
                                            <input type="file" name="image" id="image" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="add_shop_banner_btn" class="btn btn-primary">Add shopBanner</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- add new product modal end -->


                    {{-- edit employee modal start --}}
                    <div class="modal fade" id="editShopBannerModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Shop Banner</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="#" method="POST" id="edit_shop_banner_form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="banner_id" id="banner_id">
                                    <input type="hidden" name="banner_image" id="banner_image">
                                    <div class="modal-body p-4 bg-light">

                                        <div class="my-3">
                                            <label for="description">Description</label>
                                            <input type="text" name="description" id="edit_description" class="form-control" placeholder="details" required>
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
                                        <button type="submit" id="edit_shop_banner_btn" class="btn btn-success">Update Banner</button>
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
                            <h3 class="text-dark">Manage Shop Banner</h3>
                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addShopBannerModal"><i class="bi-plus-circle me-2"></i>Banner</button>
                        </div>
                        <div class="card-body" id="show_all_shop_banner">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
{{-- this is ajax script coding --}}
@include('entrepreneur.shopBanner.shopBanner_ajax')
@endsection





