@extends('layouts.app')

@section('content')
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-12 ftco-animate">
                            <div class="single-slider owl-carousel">
                                <div class="item">
                                    <div class="hotel-img" style="background-image: url({{ asset($car->image) }});"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
                            <h2>{{ $car->model }}</h2>

                            <p>
                                {{ $car->description }}
                            </p>

                            <ul>
                                <li>
                                    <p>
                                        <strong>Country:</strong> <span>{{ $car->country }}</span>
                                    </p>
                                </li>

                                <li>
                                    <p>
                                        <strong>City:</strong> <span>{{ $car->city }}</span>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section>
@endsection
