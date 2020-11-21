@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Booking</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Edit Booking</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        @include('admin.partials.sessions')

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Booking Form</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" id="edit-form-hotel" action="{{ route('available-rooms.bookings.update', ['available_room' => $booking->available_room_id, 'booking' => $booking]) }}" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name client*</label>

                                                <input value="{{ $booking->name_client }}" required name="name_client" type="text" class="form-control" placeholder="Enter Title">
                                            </div>

                                            <input name="available_room_id" type="hidden" value="{{ request()->available_room }}">

                                            <div class="form-group">
                                                <label>Start date*</label>

                                                <input value="{{ $booking->start_date }}" required name="start_date" type="date" class="form-control" placeholder="Enter Start date">
                                            </div>

                                            <div class="form-group">
                                                <label>End date*</label>

                                                <input value="{{ $booking->end_date }}" required name="end_date" type="date" class="form-control" placeholder="Enter Start date">
                                            </div>

                                            <div class="form-group">
                                                <label>Status*</label>

                                                <input value="{{ $booking->status }}" required name="status" type="text" class="form-control" placeholder="Enter status">
                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection