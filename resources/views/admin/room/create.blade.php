@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Room</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>

                            <li class="breadcrumb-item active">Create Room</li>
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
                                <h3 class="card-title">Add Room Form</h3>
                            </div>

                            <div class="card-body">
                                <form method="post" action="{{ route('hotels.rooms.store', ['hotel' => request()->hotel]) }}" role="form" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Name*</label>

                                                <input required name="name" type="text" class="form-control" placeholder="Enter Title">
                                            </div>

                                            <div class="form-group">
                                                <label>Address*</label>

                                                <input required name="address" type="text" class="form-control" placeholder="Enter Title">
                                            </div>

                                            <div class="form-group">
                                                <label>Description*</label>

                                                <textarea class="textarea" required name="description"></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label>Price*</label>

                                                <input required name="price" type="text" class="form-control" placeholder="Enter Price">
                                            </div>

                                            <div class="form-group">
                                                <label>Rating</label>

                                                <input name="rating" type="text" class="form-control" placeholder="Enter Rating">
                                            </div>

                                            <div class="form-group">
                                                <label>Count beds</label>

                                                <input name="count_beds" type="text" class="form-control" placeholder="Enter count beds">
                                            </div>

                                            <div class="form-group">
                                                <label>Hotel</label>

                                                <select name="hotel_id" class="form-control">
                                                    @foreach($hotels as $hotel)
                                                        <option @if (strtolower($hotel->id) == strtolower(request()->hotel))
                                                                {{ 'selected' }}
                                                                @endif value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                                                    @endforeach
                                                </select>
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