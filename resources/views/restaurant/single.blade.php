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

                        <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                            <h4 class="mb-4">Review &amp; Ratings</h4>

                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ route('send.hotel.rating') }}" method="post" class="star-rating">
                                        @csrf

                                        <input type="hidden" name="hotel_slug" value="{{ $restaurant->slug }}">

                                        <div class="form-check">
                                            <input type="radio" value="5" name="rating_value" class="form-check-input" id="exampleCheck1">

                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate">
                                                    <span>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        100 Ratings
                                                    </span>
                                                </p>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" value="4" name="rating_value" class="form-check-input" id="exampleCheck1">

                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate">
                                                    <span>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star-o"></i>
                                                        30 Ratings
                                                    </span>
                                                </p>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" value="3" name="rating_value" class="form-check-input" id="exampleCheck1">

                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate">
                                                    <span>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star-o"></i>
                                                        <i class="icon-star-o"></i>
                                                        5 Ratings
                                                    </span>
                                                </p>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" value="2" name="rating_value" class="form-check-input" id="exampleCheck1">

                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate">
                                                    <span>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star-o">
                                                        </i><i class="icon-star-o"></i>
                                                        <i class="icon-star-o"></i>
                                                        0 Ratings
                                                    </span>
                                                </p>
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <input type="radio" value="1" name="rating_value" class="form-check-input" id="exampleCheck1">

                                            <label class="form-check-label" for="exampleCheck1">
                                                <p class="rate">
                                                    <span>
                                                        <i class="icon-star"></i>
                                                        <i class="icon-star-o"></i>
                                                        <i class="icon-star-o"></i>
                                                        <i class="icon-star-o"></i>
                                                        <i class="icon-star-o"></i>
                                                        0 Ratings
                                                    </span>
                                                </p>
                                            </label>
                                        </div>

                                        <div class="form-group">
                                            <textarea name="comment" placeholder="Text" style="width: 100%;"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-primary py-3" type="submit">Send Rating</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section>
@endsection
