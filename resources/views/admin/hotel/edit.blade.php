@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Hotel</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Edit Hotel</li>
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
                                <h3 class="card-title">Edit Hotel Form</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" id="edit-form-hotel" action="{{ route('hotels.update', ['hotel' => $hotel->id]) }}" role="form" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name*</label>

                                                <input required value="{{ $hotel->name }}" name="name" type="text"
                                                       class="form-control" placeholder="Enter Name Hotel">
                                            </div>

                                            <div class="form-group">
                                                <label>Address*</label>

                                                <input value="{{ $hotel->address }}" required name="address" type="text"
                                                       class="form-control" placeholder="Enter Address Hotel">
                                            </div>

                                            <div class="form-group">
                                                <label>Description</label>

                                                <textarea name="description" class="textarea"
                                                          placeholder="Place some text here"
                                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                    {{ $hotel->description }}
                                                </textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Price*</label>

                                                <input value="{{ $hotel->price }}" step="0.01" name="price" type="number" class="form-control" placeholder="Enter Price">
                                            </div>

                                            <div class="form-group">
                                                <label>Country*</label>

                                                <input value="{{ $hotel->country }}" required name="country" type="text" class="form-control" placeholder="Enter Country">
                                            </div>

                                            <div class="form-group">
                                                <label>City*</label>

                                                <input value="{{ $hotel->city }}" required name="city" type="text" class="form-control" placeholder="Enter Country">
                                            </div>

                                            <div class="form-group">
                                                <label>Video</label>

                                                <input value="{{ $hotel->video }}" name="video" type="text" class="form-control" placeholder="Enter Country">
                                            </div>

                                            <div class="hotel-gallery">
                                                @if (count($hotel->galleries))
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            @foreach($hotel->galleries as $item)
                                                                <div class="col-md-3">
                                                                    <img src="{{ asset($item->image) }}">

                                                                    <a href="#" class="icon-delete del-image" id-attr="{{ $item->id }}" file-attr="{{ $item->image }}">Delete</a>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif

                                                <input type="hidden" name="id" id="hotel_id" value="{{ $hotel->id }}">

                                                <input type="file" name="image" id="select_file" />
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