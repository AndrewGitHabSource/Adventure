@extends('layouts.app')

@section('content')
    <div class="flights container">
        <div class="row">
            @foreach($flights as $flight)
                <div class="flight">
                    <img src="{{ $flight->logo }}">

                    <div class="flight-place">
                        <p>
                            <span>From:</span>  {{ $flight->from }}
                        </p>

                        <p>
                            <span>Where:</span> {{ $flight->where }}
                        </p>

                        <p>
                            <span>Price:</span> {{ $flight->price }}
                        </p>
                    </div>

                    <div class="dates">
                        <p>
                            <span>Date From:</span> {{ $flight->date_start }}
                        </p>

                        <p>
                            <span>Date End:</span> {{ $flight->date_end }}
                        </p>

                        <p>
                            <span>Time:</span> {{ $flight->time }}
                        </p>
                    </div>

                    <div>
                        {{ $flight->description }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection