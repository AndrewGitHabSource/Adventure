@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Place</h1>
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
                                <form method="post" id="edit-form-hotel" action="{{ route('places.update', ['place' => $place->id]) }}" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name*</label>

                                                <input value="{{ $place->name }}" required name="name" type="text" class="form-control" placeholder="Enter Name">
                                            </div>

                                            <div class="form-group">
                                                <label>Country*</label>

                                                <select name="country" id="select_country" class="form-control">
                                                    @foreach($countries as $country)
                                                        <option @if (strtolower($country->name) == strtolower($place->country))
                                                            {{ 'selected' }}
                                                        @endif value="{{ $country->name }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>City*</label>

                                                <select name="city" id="select_city" class="form-control">
                                                    @foreach($cities as $city)
                                                        <option @if (strtolower($city->name) == strtolower($place->city))
                                                            {{ 'selected' }}
                                                        @endif value="{{ $city->name }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Address</label>

                                                <input value="{{ $place->address }}" name="address" type="text" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Description*</label>

                                                <textarea class="textarea" required name="description">{{ $place->description }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Price</label>

                                                <input value="{{ $place->price }}" name="price" type="text" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label>Rating*</label>

                                                <input value="{{ $place->rating }}" required name="rating" type="text" class="form-control" placeholder="Enter rating">
                                            </div>

                                            <div class="form-check">
                                                <input name="popular" @if ($place->popular){{'checked'}}@endif class="form-check-input" type="checkbox">

                                                <label class="form-check-label">Popular</label>
                                            </div>

                                            <div class="form-group">
                                                <label>Period*</label>

                                                <input value="{{ $place->period }}" required name="period" type="text" class="form-control">
                                            </div>

                                            <div style="width: 400px;">
                                                <img src="{{ $place->image }}" style="max-width: 100%;">
                                            </div>

                                            <div class="form-group">
                                                <label>Image</label>

                                                <input name="image" type="file" class="form-control">
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