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

                            <li class="breadcrumb-item active">Edit City</li>
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
                                <h3 class="card-title">Edit City Form</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" id="edit-form-hotel" action="{{ route('cities.update', ['city' => $city->id]) }}" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name*</label>

                                                <input required value="{{ $city->name }}" name="name" type="text" class="form-control" placeholder="Enter Name Hotel">
                                            </div>

                                            <div class="form-group">
                                                <label>Country</label>

                                                <select name="country" class="form-control">
                                                    @foreach($countries as $country)
                                                        <option @if ($city->country->id == $country->id)
                                                            {{ 'selected' }}
                                                        @endif value="{{ $country->id }}">{{ $country->name }}</option>
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