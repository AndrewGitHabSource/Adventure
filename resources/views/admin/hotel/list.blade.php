@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Hotels</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>

                            <li class="breadcrumb-item active">List Hotels</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Responsive Hover Table</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 280px;">
                                        <form name="form" method="get" action="{{ route('hotel.search') }}" style="width: 100%; display: flex;">
                                            <input type="text" name="search" value="@if(request()->search){{request()->search}}@endif" class="form-control float-right" placeholder="Search">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Name</th>

                                            <th>Address</th>

                                            <th>Price</th>

                                            <th>Country</th>

                                            <th>City</th>

                                            <th>Control</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if (count($hotels))
                                            @foreach($hotels as $hotel)
                                                <tr>
                                                    <td>{{ $hotel->name }}</td>

                                                    <td>{{ $hotel->address }}</td>

                                                    <td>{{ $hotel->price }}</td>

                                                    <td>{{ $hotel->country }}</td>

                                                    <td>{{ $hotel->city }}</td>

                                                    <td>
                                                        <form method="post" action="{{ route('hotels.destroy', ['hotel' => $hotel]) }}">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit">Delete</button>
{{--                                                            <a href="">Delete</a><br>--}}
                                                        </form>

                                                        <a href="{{ route('hotels.edit', ['hotel' => $hotel]) }}">Edit</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>

                                <div class="pagination">
                                    {{ $hotels->appends(request()->except('_token'))->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection