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
                    {{-- edit employee modal start --}}
                    <div class="modal fade" id="editStatusModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Publish Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="#" method="POST" id="edit_entrepreneur_status_form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="status_id" id="status_id">

                                    <div class="modal-body p-4 bg-light">
                                        <div class="my-3">
                                            <label for="edit_entrepreneur_status">Entrepreneur Publish</label>
                                            <select class="form-select" name="entrepreneur_status" id="edit_entrepreneur_status" aria-label="Default select example" required>
                                                <option selected disabled>select Status </option>
                                                <option value="0">Not Published</option>
                                                <option value="1">Published</option>
                                              </select>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="edit_entrepreneur_status_btn" class="btn btn-success">Update Status</button>
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
                            <h3 class="text-dark">Manage Publish Details</h3>
                        </div>
                        <div class="card-body" id="show_all_publish">
                            <h1 class="text-center text-secondary my-5">Loading...</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
{{-- this is ajax script coding --}}
@include('admin.publish.publish_ajax')
@endsection





