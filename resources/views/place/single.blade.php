@extends('layouts.app')

@section('content')
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if(session()->has('success_message'))
                        <div class="alert alert-success">
                            {{ session()->get('success_message') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>

                            @foreach($errors->all() as $error)
                                {{ $error }}<br/>
                            @endforeach
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12 ftco-animate">
                            <div class="single-slider owl-carousel">
                                <div class="item">
                                    <div class="hotel-img" style="background-image: url({{ asset($place->image) }});"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
                            <span>Our Best Places</span>

                            <h2>{{ $place->name }}</h2>

                            <p class="rate mb-5">
                                <span class="loc">
                                    <a href="#"><i class="icon-map"></i> {{ $place->address }}</a>
                                </span>

                                <span class="star">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if($i < $place->rating)
                                            <i class="icon-star"></i>
                                        @else
                                            <i class="icon-star-o"></i>
                                        @endif
                                    @endfor

                                    <span>{{ $place->rating }} Rating</span>
                                </span>
                            </p>

                            <p>
                                {{ $place->description }}
                            </p>

                            <ul>
                                <li>
                                    <p><strong>Price:</strong> <span>${{ $place->price }}</span></p>
                                </li>

                                <li>
                                    <p><strong>Country:</strong> <span>{{ $place->country }}</span></p>
                                </li>

                                <li>
                                    <p><strong>City:</strong> <span>{{ $place->city }}</span></p>
                                </li>

                                <li>
                                    <p><strong>Period:</strong> <span>{{ $place->period }}</span></p>
                                </li>
                            </ul>
                        </div>

                        @include('partials/rating_form', ['id_model' => $place->slug, 'model' => 'App\Place'])
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section>
@endsection
