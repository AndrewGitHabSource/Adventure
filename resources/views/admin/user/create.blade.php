@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create USer</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Create User</li>
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
                                <h3 class="card-title">Add User Form</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" action="{{ route('users.store') }}" role="form" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name*</label>

                                                <input required name="name" type="text" class="form-control" placeholder="Enter Name">
                                            </div>

                                            <div class="form-group">
                                                <label>Email*</label>

                                                <input required name="email" type="text" class="form-control" placeholder="Enter Email">
                                            </div>

                                            <div class="form-group">
                                                <label>Login*</label>

                                                <input required name="login" type="text" class="form-control" placeholder="Enter Login">
                                            </div>

                                            <div class="form-group">
                                                <label>Password*</label>

                                                <input required name="password" type="text" class="form-control" placeholder="Enter Password">
                                            </div>

                                            <div class="form-group">
                                                <label>Info</label>

                                                <textarea class="textarea" name="info"></textarea>
                                            </div>

                                            <div class="form-check">
                                                <input name="is_admin" class="form-check-input" type="checkbox">

                                                <label class="form-check-label">Is Admin</label>
                                            </div>

                                            <div class="form-group">
                                                <label>Groups</label>

                                                <select name="groups[]" class="select2" data-placeholder="Select a State" multiple="multiple" style="width: 100%;">
                                                    @foreach($groups as $group)
                                                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Image</label>

                                                <input name="profile_photo_path" type="file" class="form-control">
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