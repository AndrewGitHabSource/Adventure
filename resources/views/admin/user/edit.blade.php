@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit User</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Edit User</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @include('admin.partials.sessions')

                    <div class="col-sm-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit User Form</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" id="edit-form-hotel" action="{{ route('users.update', ['user' => $user->id]) }}" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name*</label>

                                                <input value="{{ $user->name }}" required name="name" type="text" class="form-control" placeholder="Enter Name">
                                            </div>

                                            <div class="form-group">
                                                <label>Email*</label>

                                                <input value="{{ $user->email }}" required name="email" type="text" class="form-control" placeholder="Enter Email">
                                            </div>

                                            <div class="form-group">
                                                <label>Login*</label>

                                                <input value="{{ $user->login }}" required name="login" type="text" class="form-control" placeholder="Enter Login">
                                            </div>

                                            <div class="form-group">
                                                <label>Password*</label>

                                                <input value="{{ $user->password }}" required name="password" type="password" class="form-control" placeholder="Enter Password">
                                            </div>

                                            <div class="form-group">
                                                <label>Info*</label>

                                                <textarea class="textarea" required name="info">{{ $user->info }}</textarea>
                                            </div>

                                            <div class="form-check">
                                                <input name="is_admin" @if ($user->is_admin){{'checked'}}@endif class="form-check-input" type="checkbox">

                                                <label class="form-check-label">Is Admin</label>
                                            </div>

                                            <div style="width: 400px;">
                                                <img src="{{ $user->profile_photo_path }}" style="max-width: 100%;">
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