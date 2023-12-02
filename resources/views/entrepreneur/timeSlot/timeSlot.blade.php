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
            <div class="col-md-12">
                <!-- add new product modal start -->
                <div class="modal fade" id="addTimeSlotModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">TimeSlot</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="#" method="POST" id="add_time_slot_form" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body p-4 bg-light">

                                    <div class="row">

                                        <div class="col">
                                            <div class="my-3">
                                                <label for="monday">Monday</label>
                                                <input type="text" name="monday" id="monday" class="form-control" placeholder="8:00 AM TO 6:00 PM" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col">
                                            <div class="my-3">
                                                <label for="tuesday">Tuesday</label>
                                                <input type="text" name="tuesday" id="tuesday" class="form-control" placeholder="8:00 AM TO 6:00 PM" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col">
                                            <div class="my-3">
                                                <label for="wednesday">Wednesday</label>
                                                <input type="text" name="wednesday" id="wednesday" class="form-control" placeholder="8:00 AM TO 6:00 PM" required>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">

                                        <div class="col">
                                            <div class="my-3">
                                                <label for="thursday">Thursday</label>
                                                <input type="text" name="thursday" id="thursday" class="form-control" placeholder="8:00 AM TO 6:00 PM" required>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="my-3">
                                                <label for="friday">Friday</label>
                                                <input type="text" name="friday" id="friday" class="form-control" placeholder="8:00 AM TO 6:00 PM" required>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="my-3">
                                                <label for="saturday">Satueday</label>
                                                <input type="text" name="saturday" id="saturday" class="form-control" placeholder="8:00 AM TO 6:00 PM" required>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="my-3">
                                                <label for="sunday">Sunday</label>
                                                <input type="text" name="sunday" id="sunday" class="form-control" placeholder="8:00 AM TO 6:00 PM" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="add_time_slot_btn" class="btn btn-primary">Add Time Slot</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- add new product modal end -->


                {{-- edit employee modal start --}}
                <div class="modal fade" id="editTimeSlotModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit TimeSlot</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="#" method="POST" id="edit_time_slot_form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="time_slot_id" id="time_slot_id">
                                <div class="modal-body p-4 bg-light">

                                    <div class="row">

                                        <div class="col">
                                            <div class="my-3">
                                                <label for="monday">Monday</label>
                                                <input type="text" name="monday" id="edit_monday" class="form-control" placeholder="8:00 AM TO 6:00 PM" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col">
                                            <div class="my-3">
                                                <label for="tuesday">Tuesday</label>
                                                <input type="text" name="tuesday" id="edit_tuesday" class="form-control" placeholder="8:00 AM TO 6:00 PM" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="col">
                                            <div class="my-3">
                                                <label for="wednesday">Wednesday</label>
                                                <input type="text" name="wednesday" id="edit_wednesday" class="form-control" placeholder="8:00 AM TO 6:00 PM" required>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">

                                        <div class="col">
                                            <div class="my-3">
                                                <label for="thursday">Thursday</label>
                                                <input type="text" name="thursday" id="edit_thursday" class="form-control" placeholder="8:00 AM TO 6:00 PM" required>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="my-3">
                                                <label for="friday">Friday</label>
                                                <input type="text" name="friday" id="edit_friday" class="form-control" placeholder="8:00 AM TO 6:00 PM" required>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="my-3">
                                                <label for="saturday">Satueday</label>
                                                <input type="text" name="saturday" id="edit_saturday" class="form-control" placeholder="8:00 AM TO 6:00 PM" required>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="my-3">
                                                <label for="sunday">Sunday</label>
                                                <input type="text" name="sunday" id="edit_sunday" class="form-control" placeholder="8:00 AM TO 6:00 PM" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" id="edit_time_slot_btn" class="btn btn-success">Update TimeSlot</button>
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
                        <h3 class="text-dark">Manage TimeSlot</h3>
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addTimeSlotModal"><i class="bi-plus-circle me-2"></i>TimeSlot</button>
                    </div>
                    <div class="card-body" id="show_all_time_slot">
                        <h1 class="text-center text-secondary my-5">Loading...</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
{{-- this is ajax script coding --}}
@include('entrepreneur.timeSlot.timeSlot_ajax')
@endsection
