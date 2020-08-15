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
                                    <div class="hotel-img" style="background-image: url({{ asset($restaurant->image) }});"></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
                            <span>Our Best Restaurants</span>

                            <h2>{{ $restaurant->name }}</h2>

                            <p class="rate mb-5">
                                <span class="loc">
                                    <a href="#"><i class="icon-map"></i> {{ $restaurant->address }}</a>
                                </span>

                                <span class="star">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if($i < $restaurant->rating)
                                            <i class="icon-star"></i>
                                        @else
                                            <i class="icon-star-o"></i>
                                        @endif
                                    @endfor

                                    <span>{{ $restaurant->rating }} Rating</span>
                                </span>
                            </p>

                            <p>
                                {{ $restaurant->description }}
                            </p>

                            <ul>
                                <li>
                                    <p><strong>Country:</strong> <span>{{ $restaurant->country }}</span></p>
                                </li>

                                <li>
                                    <p><strong>City:</strong> <span>{{ $restaurant->city }}</span></p>
                                </li>
                            </ul>
                        </div>

                        @include('partials/rating_form', ['id_model' => $restaurant->slug, 'model' => 'App\Restaurant'])
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section>
@endsection
