@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit User Booking</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Edit User Booking</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit User Booking Form</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" id="edit-form-hotel" action="{{ route('user_bookings.update', ['user_booking' => $user_booking->id]) }}" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name*</label>

                                                <input value="{{ $user_booking->name }}" required name="name" type="text" class="form-control" placeholder="Enter Name">
                                            </div>

                                            <div class="form-group">
                                                <label>Email*</label>

                                                <input value="{{ $user_booking->email }}" required name="email" type="email" class="form-control" placeholder="Enter Email">
                                            </div>

                                            <div class="form-group">
                                                <label>Phone*</label>

                                                <input value="{{ $user_booking->phone }}" required name="phone" type="text" class="form-control" placeholder="Enter Phone">
                                            </div>

                                            <div class="form-group">
                                                <label>Message*</label>

                                                <textarea class="textarea" required name="message">{{ $user_booking->message }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Hotel*</label>

                                                <select name="hotel_id" id="select_hotel" class="form-control">
                                                    @foreach($hotels as $hotel)
                                                        <option @if (strtolower($hotel->id) == strtolower($user_booking->hotel_id))
                                                            {{ 'selected' }}
                                                        @endif value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Room*</label>

                                                <select name="room_id" id="select_room" class="form-control">
                                                    @foreach($rooms as $room)
                                                        <option @if (strtolower($room->id) == strtolower($user_booking->room_id))
                                                            {{ 'selected' }}
                                                        @endif value="{{ $room->id }}">{{ $room->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Date Start*</label>

                                                <input value="{{ $user_booking->start_date }}" required name="start_date" type="date" class="form-control" placeholder="Enter Model">
                                            </div>

                                            <div class="form-group">
                                                <label>Date End*</label>

                                                <input value="{{ $user_booking->end_date }}" required name="end_date" type="date" class="form-control" placeholder="Enter Model">
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