@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create City</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Create City</li>
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
                                <h3 class="card-title">Add Flight Form</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" action="{{ route('flights.store') }}" role="form" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>From*</label>

                                                <input required name="from" type="text" class="form-control" placeholder="Enter From">
                                            </div>

                                            <div class="form-group">
                                                <label>Where*</label>

                                                <input required name="where" type="text" class="form-control" placeholder="Enter Where">
                                            </div>

                                            <div class="form-group">
                                                <label>Description*</label>

                                                <textarea class="textarea" required name="description"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Time*</label>

                                                <input required name="time" type="text" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Price*</label>

                                                <input required name="price" type="text" class="form-control" placeholder="Enter Price">
                                            </div>

                                            <div class="form-group">
                                                <label>Date start*</label>

                                                <input required name="date_start" type="date" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Date End*</label>

                                                <input required name="date_end" type="date" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Travelers*</label>

                                                <input required name="travelers" type="text" class="form-control" placeholder="Travelers">
                                            </div>

                                            <div class="form-group">
                                                <label>Logo*</label>

                                                <input required name="logo" type="file" class="form-control" placeholder="Logo">
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