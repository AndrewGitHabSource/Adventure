@extends('layouts.admin.app')

@section('content')
    @include('admin.partials.top_navbar')

    @include('admin.partials.aside')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>List Rooms</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/admin">Home</a>
                            </li>

                            <li class="breadcrumb-item active">List Rooms</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div>
                            <a href="{{ route('hotels.available-rooms.create', ['hotel' => request()->hotel]) }}">Add Room</a>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Available Rooms</h3>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <div class="floors">
                                    @for($i = 1; $i <= $maxFloor; $i++)
                                        <h2>Floor - {{ $i }}</h2>

                                        <div class="floor-area">
                                            @foreach($available_rooms[$i] as $room)
                                                <a href="{{ route('hotels.available-rooms.edit', ['hotel' => $room->hotel_id, 'available_room' => $room]) }}">
                                                    <span>№: {{ $room->number }}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection