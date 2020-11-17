@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Flight</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Edit Flight</li>
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
                                <h3 class="card-title">Edit Flight Form</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" id="edit-form-hotel" action="{{ route('flights.update', ['flight' => $flight->id]) }}" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>From*</label>

                                                <input required value="{{ $flight->from }}" name="from" type="text" class="form-control" placeholder="Enter From">
                                            </div>

                                            <div class="form-group">
                                                <label>Where*</label>

                                                <input required value="{{ $flight->where }}" name="where" type="text" class="form-control" placeholder="Enter Where">
                                            </div>

                                            <div class="form-group">
                                                <label>Description*</label>

                                                <textarea class="textarea" required name="description">{{ $flight->description }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Time</label>

                                                <input value="{{ $flight->time }}" name="time" type="text" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Price*</label>

                                                <input required value="{{ $flight->price }}" name="price" type="text" class="form-control" placeholder="Enter Price">
                                            </div>

                                            <div class="form-group">
                                                <label>Date start*</label>

                                                <input required value="{{ $flight->date_start->format('Y-m-d') }}" name="date_start" type="date" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Date End*</label>

                                                <input required value="{{ $flight->date_end->format('Y-m-d') }}" name="date_end" type="date" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Travelers*</label>

                                                <input required value="{{ $flight->travelers }}" name="travelers" type="text" class="form-control" placeholder="Travelers">
                                            </div>

                                            <div style="width: 400px;">
                                                <img src="{{ $flight->logo }}" style="max-width: 100%;">
                                            </div>

                                            <div class="form-group">
                                                <label>Logo</label>

                                                <input name="logo" type="file" class="form-control" placeholder="Logo">
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