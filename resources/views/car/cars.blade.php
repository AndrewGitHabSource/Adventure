@extends('layouts.app')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @if ($cars)
                            @foreach ($cars as $car)
                                <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                                    <div class="destination">
                                        <a href="{{ route('car', ['car' => $car->slug]) }}" class="img img-2 d-flex justify-content-center align-items-center"
                                           style="background-image: url({{ $car->image }});">

                                            <div class="icon d-flex justify-content-center align-items-center">
                                                <span class="icon-link"></span>
                                            </div>
                                        </a>
                                        <div class="text p-3">
                                            <div class="d-flex">
                                                <div class="one">
                                                    <h3>
                                                        <a href="{{ route('car', ['car' => $car->slug]) }}">{{ $car->model }}</a>
                                                    </h3>
                                                </div>
                                            </div>

                                            <p>{{ Str::limit($car->description, 180, '...') }}</p>

                                            <hr>

                                            <p class="bottom-area d-flex">
                                                <span><i class="icon-map-o"></i> {{ $car->country }}, {{ $car->city }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="row mt-5">
                        <div class="col text-center">
                            <div class="block-27">
                                {{ $cars->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
