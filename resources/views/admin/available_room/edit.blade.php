@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Room</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Edit Room</li>
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
                                <h3 class="card-title">Edit Room Form</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" id="edit-form-hotel" action="{{ route('hotels.available-rooms.update', ['available_room' => $available_room->id, 'hotel' => $available_room->hotel_id]) }}" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Floor*</label>

                                                <input value="{{ $available_room->floor }}" required name="floor" type="text" class="form-control" placeholder="Enter floor">
                                            </div>

                                            <div class="form-group">
                                                <label>Beds*</label>

                                                <input value="{{ $available_room->beds }}" required name="beds" type="text" class="form-control" placeholder="Enter beds">
                                            </div>

                                            <div class="form-group">
                                                <label>Number*</label>

                                                <input value="{{ $available_room->number }}" required name="number" type="text" class="form-control" placeholder="Enter number">
                                            </div>

                                            <div class="form-group">
                                                <label>Hotel</label>

                                                <select name="hotel_id" class="form-control">
                                                    @foreach($hotels as $hotel)
                                                        <option @if (strtolower($hotel->id) == strtolower($available_room->hotel_id))
                                                                {{ 'selected' }}
                                                                @endif value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div>
                                    <a href="{{ route('available-rooms.bookings.create', ['available_room' => $available_room]) }}">Add Booking</a>
                                </div>

                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Name</th>

                                        <th>Start date</th>

                                        <th>End date</th>

                                        <th>Status</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @if (count($bookings))
                                        @foreach($bookings as $booking)
                                            <tr>
                                                <td>{{ $booking->name_client }}</td>

                                                <td>{{ $booking->start_date }}</td>

                                                <td>{{ $booking->end_date }}</td>

                                                <td>{{ $booking->status }}</td>

                                                <td>
                                                    <form method="post" action="{{ route('available-rooms.bookings.destroy', ['available_room' => $available_room, 'booking' => $booking]) }}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit">Delete</button>
                                                    </form>

                                                    <a href="{{ route('available-rooms.bookings.edit', ['available_room' => $available_room, 'booking' => $booking]) }}">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection