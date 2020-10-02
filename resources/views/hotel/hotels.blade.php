@extends('layouts.app')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 sidebar order-md-last ftco-animate">
                    <div class="sidebar-wrap ftco-animate">
                        <h3 class="heading mb-4">Find City</h3>

                        <form action="#" method="post" id="form-filter">
                            <div class="fields">
                                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <input name="country" type="text" class="form-control" placeholder="Destination, Country">
                                </div>

                                <div class="form-group">
                                    <input name="city" type="text" class="form-control" placeholder="Destination, City">
                                </div>

                                <div class="form-group">
                                    <input name="start_date" type="text" id="checkin_date" class="form-control checkin_date" placeholder="Date from">
                                </div>

                                <div class="form-group">
                                    <input name="end_date" type="text" id="checkout_date" class="form-control checkout_date" placeholder="Date to">
                                </div>

                                <h3 class="heading mb-4">Price Range</h3>

                                <div class="form-group">
                                    <div class="range-slider">
                                        <div class="label-slider" style="display: flex; justify-content: space-between;">
                                            <span class="start-price">0</span> - <span class="end-price">10</span>
                                        </div>

                                        <input class="price_start" name="price_start" value="0" min="0" max="100" step="1" type="range"/>
                                        <input class="price_end" name="price_end" value="20" min="0" max="100" step="1" type="range"/>
                                    </div>
                                </div>

                                <h3 class="heading mb-4">Star Rating</h3>

                                <div class="form-check">
                                    <input name="rating[]" value="5" type="checkbox" class="form-check-input" id="exampleCheck1">

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
                                    <input name="rating[]" value="4" type="checkbox" class="form-check-input" id="exampleCheck1">

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
                                    <input name="rating[]" value="3" type="checkbox" class="form-check-input" id="exampleCheck1">

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
                                    <input name="rating[]" value="2" type="checkbox" class="form-check-input" id="exampleCheck1">

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
                                    <input name="rating[]" value="1" type="checkbox" class="form-check-input" id="exampleCheck1">

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

                                <div class="form-group">
                                    <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-9 ajax-filter">
                    <div class="row">
                        @if ($hotels)
                            @foreach ($hotels as $hotel)
                                <div class="col-sm col-md-6 col-lg-4 ftco-animate">
                                    <div class="destination">
                                        <a href="{{ route('hotel', ['slug' => $hotel->slug]) }}" class="img img-2 d-flex justify-content-center align-items-center"
                                           style="background-image: url({{ $hotel->galleries[0]->image }});">

                                            <div class="icon d-flex justify-content-center align-items-center">
                                                <span class="icon-link"></span>
                                            </div>
                                        </a>
                                        <div class="text p-3">
                                            <div class="d-flex">
                                                <div class="one">
                                                    <h3>
                                                        <a href="{{ route('hotel', ['slug' => $hotel->slug]) }}">
                                                            {{ $hotel->name }}
                                                        </a>
                                                    </h3>

                                                    <p class="rate">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            @if($i < $hotel->rating)
                                                                <i class="icon-star"></i>
                                                            @else
                                                                <i class="icon-star-o"></i>
                                                            @endif
                                                        @endfor

                                                        <span>{{ $hotel->rating }} Rating</span>
                                                    </p>
                                                </div>

                                                <div class="two">
                                                    <span class="price per-price">
                                                        ${{ $hotel->price }}<br>

                                                        <small>/night</small>
                                                    </span>
                                                </div>
                                            </div>

                                            <p>{{ Str::limit($hotel->description, 180, '...') }}</p>

                                            <hr>

                                            <p class="bottom-area d-flex">
                                                <span><i class="icon-map-o"></i> {{ Str::limit($hotel->address, 10, '...') }}</span>

                                                <span class="ml-auto">
                                                    <a href="#">Book Now</a>
                                                </span>
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
                                {{ $hotels->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
