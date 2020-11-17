@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Contact</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Edit Contact</li>
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
                                <h3 class="card-title">Edit Contact Form</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" id="edit-form-hotel" action="{{ route('contacts.update', ['contact' => $contact->id]) }}" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name*</label>

                                                <input value="{{ $contact->name }}" required name="name" type="text" class="form-control" placeholder="Enter Name">
                                            </div>

                                            <div class="form-group">
                                                <label>Email*</label>

                                                <input value="{{ $contact->email }}" required name="email" type="text" class="form-control" placeholder="Enter Email">
                                            </div>

                                            <div class="form-group">
                                                <label>Subject*</label>

                                                <input value="{{ $contact->subject }}" required name="subject" type="text" class="form-control" placeholder="Enter Subject">
                                            </div>

                                            <div class="form-group">
                                                <label>IP*</label>

                                                <input value="{{ $contact->ip }}" required name="ip" type="text" class="form-control" placeholder="Enter IP">
                                            </div>

                                            <div class="form-group">
                                                <label>Message*</label>

                                                <textarea class="textarea" required name="message">{{ $contact->message }}</textarea>
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