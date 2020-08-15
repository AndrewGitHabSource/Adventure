@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 sidebar order-md-last ftco-animate">
                <div class="sidebar-wrap ftco-animate">
                    <h3 class="heading mb-4">Find City</h3>
                    <form action="#">
                        <div class="fields">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Destination, City">
                            </div>

                            <div class="form-group">
                                <div class="select-wrap one-third">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control" placeholder="Keyword search">
                                        <option value="">Select Location</option>
                                        <option value="">San Francisco USA</option>
                                        <option value="">Berlin Germany</option>
                                        <option value="">Lodon United Kingdom</option>
                                        <option value="">Paris Italy</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" id="checkin_date" class="form-control checkin_date" placeholder="Date from">
                            </div>

                            <div class="form-group">
                                <input type="text" id="checkout_date" class="form-control checkout_date" placeholder="Date to">
                            </div>

                            <div class="form-group">
                                <div class="range-slider">
                                    <span>
                                        <input type="number" value="25000" min="0" max="120000"/>	-
                                        <input type="number" value="50000" min="0" max="120000"/>
                                    </span>

                                    <input value="1000" min="0" max="120000" step="500" type="range"/>
                                    <input value="50000" min="0" max="120000" step="500" type="range"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="sidebar-wrap ftco-animate">
                    <h3 class="heading mb-4">Star Rating</h3>

                    <form method="post" class="star-rating">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="rate">
                                    <span>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                    </span>
                                </p>
                            </label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="rate">
                                    <span>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star-o"></i>
                                    </span>
                                </p>
                            </label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="rate">
                                    <span>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star-o"></i>
                                        <i class="icon-star-o"></i>
                                    </span>
                                </p>
                            </label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="rate">
                                    <span>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star-o"></i>
                                        <i class="icon-star-o"></i>
                                        <i class="icon-star-o"></i>
                                    </span>
                                </p>
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">
                                <p class="rate">
                                    <span>
                                        <i class="icon-star"></i>
                                        <i class="icon-star-o"></i>
                                        <i class="icon-star-o"></i>
                                        <i class="icon-star-o"></i>
                                        <i class="icon-star-o"></i>
                                    </span>
                                </p>
                            </label>
                        </div>
                    </form>
                </div>
            </div><!-- END-->

            <div class="col-lg-9">
                <div class="row">
                    @if($places)
                        @foreach($places as $place)
                            <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                                <div class="destination">
                                    <a href="{{ route('place', ['slug' => $place->slug]) }}" class="img img-2 d-flex justify-content-center align-items-center"
                                       style="background-image: url({{ $place->image }});">

                                        <div class="icon d-flex justify-content-center align-items-center">
                                            <span class="icon-link"></span>
                                        </div>
                                    </a>

                                    <div class="text p-3">
                                        <div class="d-flex">
                                            <div class="one">
                                                <h3>
                                                    <a href="{{ route('place', ['slug' => $place->slug]) }}">{{ $place->city }}, {{ $place->country }}</a>
                                                </h3>

                                                <p class="rate">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if($i < $place->rating)
                                                            <i class="icon-star"></i>
                                                        @else
                                                            <i class="icon-star-o"></i>
                                                        @endif
                                                    @endfor

                                                    <span>{{ $place->rating }} Rating</span>
                                                </p>
                                            </div>

                                            <div class="two">
                                                <span class="price">${{ $place->price }}</span>
                                            </div>
                                        </div>

                                        <p>{{ Str::limit($place->description, 180, '...') }}</p>

                                        <p class="days"><span>{{ $place->period }}</span></p>

                                        <hr>

                                        <p class="bottom-area d-flex">
                                            <span><i class="icon-map-o"></i> {{ $place->address }}</span>

                                            <span class="ml-auto"><a href="#">Discover</a></span>
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
                            {{ $places->links() }}
                        </div>
                    </div>
                </div>
            </div> <!-- .col-md-8 -->
        </div>
    </div>
</section>
@endsection