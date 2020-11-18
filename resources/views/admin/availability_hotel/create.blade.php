@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Availability hotel</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Create Availability hotel</li>
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
                                <h3 class="card-title">Add Availability hotel Form</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" action="{{ route('availability-hotels.store') }}" role="form" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name*</label>

                                                <input required name="name" type="text" class="form-control" placeholder="Enter Name">
                                            </div>

                                            <div class="form-group">
                                                <label>Email*</label>

                                                <input required name="email" type="email" class="form-control" placeholder="Enter Email">
                                            </div>

                                            <div class="form-group">
                                                <label>Date Start</label>

                                                <input name="date_from" type="date" class="form-control" placeholder="Enter Date to">
                                            </div>

                                            <div class="form-group">
                                                <label>Date End</label>

                                                <input name="date_to" type="date" class="form-control" placeholder="Enter Date to">
                                            </div>

                                            <div class="form-group">
                                                <label>Guest count*</label>

                                                <input required name="guest_count" type="text" class="form-control" placeholder="Enter Guest count">
                                            </div>

                                            <div class="form-group">
                                                <label>Children count*</label>

                                                <input required name="children_count" type="text" class="form-control" placeholder="Enter Children count">
                                            </div>

                                            <div class="form-group">
                                                <label>Status*</label>

                                                <select name="status" required class="form-control">
                                                    <option value="Start">Start</option>

                                                    <option value="In process">In process</option>

                                                    <option value="Completed">Completed</option>
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