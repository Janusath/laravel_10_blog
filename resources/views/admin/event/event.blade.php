
@extends('layouts.admin_layout')
@section('admin_content')

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
                    <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="#" method="POST" id="add_event_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body p-4 bg-light">

                                     <div class="row my-3">
                                        <div class="col-md-6">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="title" class="form-control" placeholder="title" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="subTitle">Sub Title</label>
                                            <input type="text" name="subTitle" id="subTitle" class="form-control" placeholder="subTitle" required>
                                        </div>
                                     </div>
                                        <div class="my-3">
                                            <label for="author">Author</label>
                                            <input type="text" name="author" id="author" class="form-control" placeholder="author" required>
                                        </div>
                                        <div class="my-3">
                                            <label for="category" class="form-label">category</label>
                                            <select class="form-select" name="category" id="category" aria-label="Default select example" required>
                                                <option selected disabled>select category </option>
                                                <option value="Clothing, Shoes & Accessories">Clothing, Shoes & Accessories</option>
                                                <option value="Home & Patio">Home & Patio</option>
                                                <option value="Baby">Baby</option>
                                                <option value="Electronics">Electronics</option>
                                                <option value="School & Office">School & Office</option>
                                                <option value="Toys">Toys</option>
                                                <option value="Sports, Fitness & Outdoors">Sports, Fitness & Outdoors</option>
                                                <option value="Entertainment">Entertainment</option>
                                                <option value="Beauty & Personal Care">Beauty & Personal Care</option>
                                                <option value="Health">Health</option>
                                                <option value="Household Essentials">Household Essentials</option>
                                                <option value="Pets">Pets</option>
                                                <option value="Grocery">Grocery</option>
                                                <option value="Celebrations & more">Celebrations & more</option>
                                                <option value="Deals & more">Deals & more</option>
                                                <option value="Services">Services</option>
                                              </select>
                                        </div>
                                        <div class="my-3">
                                            <label for="description">Description</label>
                                            <input type="text" name="description" id="description" class="form-control" placeholder="description" required>
                                        </div>
                                        <div class="my-3">
                                            <label for="image">Select Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="add_event_btn" class="btn btn-primary">Event</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- add new product modal end -->


                    {{-- edit employee modal start --}}
                    <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Event</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="#" method="POST" id="edit_event_form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="event_id" id="event_id">
                                    <input type="hidden" name="event_image" id="event_image">
                                    <div class="modal-body p-4 bg-light">

                                       <div class="row">
                                        <div class="col-md-6 my-3">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" id="edit_title" class="form-control" placeholder="title" required>
                                        </div>
                                        <div class="col-md-6 my-3">
                                            <label for="subTitle">Sub Title</label>
                                            <input type="text" name="subTitle" id="edit_subTitle" class="form-control" placeholder="subTitle" required>
                                        </div>
                                       </div>
                                        <div class="my-3">
                                            <label for="author">Author</label>
                                            <input type="text" name="author" id="edit_author" class="form-control" placeholder="author" required>
                                        </div>
                                        <div class="my-3">
                                            <label for="category" class="form-label">category</label>
                                            <select class="form-select" name="category" id="edit_category" aria-label="Default select example" required>
                                                <option selected disabled>select category </option>
                                                <option value="Clothing, Shoes & Accessories">Clothing, Shoes & Accessories</option>
                                                <option value="Home & Patio">Home & Patio</option>
                                                <option value="Baby">Baby</option>
                                                <option value="Electronics">Electronics</option>
                                                <option value="School & Office">School & Office</option>
                                                <option value="Toys">Toys</option>
                                                <option value="Sports, Fitness & Outdoors">Sports, Fitness & Outdoors</option>
                                                <option value="Entertainment">Entertainment</option>
                                                <option value="Beauty & Personal Care">Beauty & Personal Care</option>
                                                <option value="Health">Health</option>
                                                <option value="Household Essentials">Household Essentials</option>
                                                <option value="Pets">Pets</option>
                                                <option value="Grocery">Grocery</option>
                                                <option value="Celebrations & more">Celebrations & more</option>
                                                <option value="Deals & more">Deals & more</option>
                                                <option value="Services">Services</option>
                                              </select>
                                        </div>
                                        <div class="my-3">
                                            <label for="description">Description</label>
                                            <input type="text" name="description" id="edit_description" class="form-control" placeholder="description" required>
                                        </div>
                                        <div class="my-3">
                                            <label for="image">Select Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                        <div class="mt-2" id="image">

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="edit_event_btn" class="btn btn-success">Update Event</button>
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
                            <h3 class="text-dark">Manage Event</h3>
                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addEventModal"><i class="bi-plus-circle me-2"></i>Event</button>
                        </div>
                        <div class="card-body" id="show_all_events">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
{{-- this is ajax script coding --}}
@include('admin.event.event_ajax')
@endsection





