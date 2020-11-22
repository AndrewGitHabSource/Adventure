@extends('layouts.admin.app')

@section('content')
    <div class="content-wrapper" style="margin-left: 0;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Profile</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>

                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    @include('user.partials.user_info')

                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#activity" data-toggle="tab">Activity</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <div class="post-control-nav">
                                            <a href="{{ route('create.user.post') }}">Add Post</a>
                                        </div>

                                        @foreach ($posts as $post)
                                            <div class="post">
                                                <div class="user-block">
                                                    <img class="img-circle img-bordered-sm" src="{{ auth()->user()->profile_photo_path }}" alt="user image">

                                                    <span class="username">
                                                      <a href="{{ route('edit.user.post', ['id' => $post->id]) }}">{{ $post->title }}</a>
                                                    </span>

                                                    <span class="description">Shared publicly - {{ $post->date }}</span>
                                                </div>

                                                {!! Str::limit(strip_tags($post->description), 80, '...') !!}
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="tab-pane" id="settings">
                                        <form method="post" action="{{ route('save.user.settings') }}" class="form-horizontal">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>

                                                <div class="col-sm-10">
                                                    <input value="{{ $user->name }}" name="name" type="text" class="form-control" id="inputName" placeholder="Name">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>

                                                <div class="col-sm-10">
                                                    <input value="{{ $user->email }}" name="email" type="email" class="form-control" id="inputEmail" placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Login</label>

                                                <div class="col-sm-10">
                                                    <input value="{{ $user->login }}" name="login" type="text" class="form-control" id="inputName2" placeholder="Login">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="info" class="col-sm-2 col-form-label">Information</label>

                                                <div class="col-sm-10">
                                                    <textarea name="info" class="form-control" id="info" placeholder="Info">{{ $user->info }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input required type="checkbox">

                                                            I agree to the<a href="#">terms and conditions</a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection