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

        <div class="row ">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="text-dark">List of Emails </h3>
                    </div>
                    <div class="card-body" id="show_all_emails">
                        <h1 class="text-center text-secondary my-5">Loading...</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
{{-- this is ajax script coding --}}
@include('website.emailView_ajax')
@endsection
