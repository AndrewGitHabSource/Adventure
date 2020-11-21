@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Availability hotel</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Edit Availability hotel</li>
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
                                <h3 class="card-title">Edit Availability hotel Form</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" id="edit-form-hotel"
                                      action="{{ route('availability-hotels.update', ['availability_hotel' => $availability_hotel->id]) }}"
                                      role="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name*</label>

                                                <input value="{{ $availability_hotel->name }}" required name="name"
                                                       type="text" class="form-control" placeholder="Enter Name">
                                            </div>

                                            <div class="form-group">
                                                <label>Email*</label>

                                                <input value="{{ $availability_hotel->email }}" required name="email"
                                                       type="email" class="form-control" placeholder="Enter Email">
                                            </div>

                                            <div class="form-group">
                                                <label>Date Start</label>

                                                <input value="{{ $availability_hotel->date_from }}" name="date_from"
                                                       type="date" class="form-control" placeholder="Enter Date to">
                                            </div>

                                            <div class="form-group">
                                                <label>Date End</label>

                                                <input value="{{ $availability_hotel->date_to }}" name="date_to"
                                                       type="date" class="form-control" placeholder="Enter Date to">
                                            </div>

                                            <div class="form-group">
                                                <label>Guest count*</label>

                                                <input value="{{ $availability_hotel->guest_count }}" required
                                                       name="guest_count" type="text" class="form-control"
                                                       placeholder="Enter Guest count">
                                            </div>

                                            <div class="form-group">
                                                <label>Children count*</label>

                                                <input value="{{ $availability_hotel->children_count }}" required
                                                       name="children_count" type="text" class="form-control"
                                                       placeholder="Enter Children count">
                                            </div>

                                            <div class="form-group">
                                                <label>Status*</label>

                                                <select name="status" required class="form-control">
                                                    <option @if ($availability_hotel->status == 'Start')
                                                        {{ 'selected' }}
                                                            @endif>Start
                                                    </option>

                                                    <option @if ($availability_hotel->status == 'In process')
                                                        {{ 'selected' }}
                                                            @endif>In process
                                                    </option>

                                                    <option @if ($availability_hotel->status == 'Completed')
                                                        {{ 'selected' }}
                                                            @endif>Completed
                                                    </option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Hotel*</label>

                                                <select name="hotel_id" required class="form-control select2bs4" style="width: 100%;">
                                                    @foreach($hotels as $hotel)
                                                        <option @if ($availability_hotel->hotel_id == $hotel->id)
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection