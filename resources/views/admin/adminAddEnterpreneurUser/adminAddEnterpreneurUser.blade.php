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
            <div class="col-md-12">
                <!-- add new product modal start -->
                <div class="modal fade" id="addEntrepreneurRegistrationModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Entrepreneur Registration</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="#"   method="POST" id="add_entrepreneur_registration_form" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body p-4 bg-light">
                                    <div class="row">


                                      <div class="col-md-6 my-3">
                                        <label for="ownerName" class="form-label">Owner Name</label>
                                        <input type="text" name="ownerName" class="form-control  id="ownerName"  required>

                                    </div>
                                      <div class="col-md-6 my-3">
                                          <label for="shopName" class="form-label">shop Name</label>
                                          <input type="text" name="shopName" class="form-control" id="shopName" required>

                                        </div>

                                        <div class="col-md-6 my-3">
                                          <label for="location" class="form-label">location</label>
                                          <input type="text" name="location" class="form-control" id="location"  required>

                                        </div>
                                        <div class="col-md-6 my-3">
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

                                        <div class="col-md-6 my-3">
                                          <label for="businessRegistrationNo" class="form-label">Business Registration Number</label>
                                          <input type="text" name="businessReNo" class="form-control" id="businessRegistrationNo"  required>

                                        </div>
                                        <div class="col-md-6 my-3">
                                          <label for="phoneNo" class="form-label">phone Number</label>
                                          <input type="number" name="phoneNo" class="form-control" id="phoneNo" required>

                                        </div>


                                      <div class="col-md-6 my-3">
                                        <label for="Email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="Email"  required>

                                      </div>

                                      <div class="col-md-6 my-3">
                                          <label for="Password" class="form-label">Password</label>
                                          <div class="input-group input-group-merge">
                                              <input type="password" name="password" class="form-control" id="Password" required>
                                              <span class="input-group-text cursor-pointer toggle-password" data-target="Password"><i class="bx bx-hide"></i></span>

                                          </div>
                                      </div>

                                      <div class="col-md-6 mb-5">
                                          <label for="ConfirmPassword" class="form-label">Confirm Password</label>
                                          <div class="input-group input-group-merge">
                                              <input type="password" name="confirmPassword" class="form-control" id="ConfirmPassword"  required>
                                              <span class="input-group-text cursor-pointer toggle-password" data-target="ConfirmPassword"><i class="bx bx-hide"></i></span>

                                          </div>
                                      </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="add_entrepreneur_registration_btn" class="btn btn-primary">Registration</button>
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
                        <h3 class="text-dark">Manage Entrepreneur Registration</h3>
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addEntrepreneurRegistrationModal"><i class="bi-plus-circle me-2"></i>Registration</button>
                    </div>
                    <div class="card-body" id="show_all_time_slot">
                        <h1 class="text-center text-secondary my-5">Loading...</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Template Main JS File -->

<script>
    $(document).ready(function () {
        $(".toggle-password").click(function () {
            var targetId = $(this).data("target");
            var input = $("#" + targetId);
            var icon = $(this).find("i");

            if (input.attr("type") === "password") {
                input.attr("type", "text");
                icon.removeClass("bx bx-hide").addClass("bx bx-show");
            } else {
                input.attr("type", "password");
                icon.removeClass("bx bx-show").addClass("bx bx-hide");
            }
        });
    });
</script>

{{-- this is ajax script coding --}}
@include('admin.adminAddEnterpreneurUser.adminAddEnterpreneurUser_ajax')
@endsection
