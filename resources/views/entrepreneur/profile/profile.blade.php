@extends('layouts.entrepreneur_layout')
@section('entrepreneur_content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                <img class="rounded-circle" src="{{
                    (!empty($user->picture))? url('images/enterpreneur_images/' . $user->picture): url('images/enterpreneur_images/202311281926user.jpg') }}" alt="Card image cap">

              <h2>{{ $user->ownerName  }}</h2>
              <h3>Admin</h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">owner Name</div>
                    <div class="col-lg-9 col-md-8">{{ $user->ownerName }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Shop Name</div>
                    <div class="col-lg-9 col-md-8">{{ $user->shopName}}</div>
                </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Location</div>
                    <div class="col-lg-9 col-md-8">{{ $user->location }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Business ReNo </div>
                    <div class="col-lg-9 col-md-8">{{ $user->businessReNo }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone No</div>
                    <div class="col-lg-9 col-md-8">{{ $user->phoneNo }}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST" action="{{ route('entrepreneur_profile_update') }}" enctype="multipart/form-data">
                    @csrf
                     <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">



                <img id="showImage"  class="rounded avatar-lg" src="{{
                    (!empty($user->picture))? url('images/enterpreneur_images/' . $user->picture): url('images/enterpreneur_images/202311281926user.jpg') }}" alt="Card image cap">

                        {{-- <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div> --}}
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="ownerName" class="col-md-4 col-lg-3 col-form-label">owner Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="ownerName" type="text" class="form-control" id="ownerName" value="{{ $user->ownerName }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="shopName" class="col-md-4 col-lg-3 col-form-label">Shop Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="shopName" type="text" class="form-control" id="shopName" value="{{ $user->shopName}}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="location" class="col-md-4 col-lg-3 col-form-label">Location</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="location" type="text" class="form-control" id="location" value="{{ $user->location }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="phoneNo" class="col-md-4 col-lg-3 col-form-label">Phone No</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phoneNo" type="text" class="form-control" id="phoneNo" value="{{ $user->phoneNo }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="email" value="{{ $user->email }}">
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password" type="text" class="form-control" id="password"  value="{{ $user->password }}">
                        </div>
                      </div>

                    <div class="row mb-3">
                        <label for="picture" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="picture" id="image" type="file" class="form-control" id="picture" >
                        </div>
                      </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>


  </main><!-- End #main -->
@endsection


