@extends('layouts.app')

@section('content')
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 sidebar">
                    <div class="sidebar-wrap ftco-animate">
                        <h3 class="heading mb-4">Find City</h3>

                        <form action="#">
                            <div class="fields">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Destination, City">
                                </div>

                                <div class="form-group">
                                    <div class="select-wrap one-third">
                                        <div class="icon">
                                            <span class="ion-ios-arrow-down"></span>
                                        </div>

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
                                    <input type="text" id="checkin_date" class="form-control" placeholder="Date from">
                                </div>

                                <div class="form-group">
                                    <input type="text" id="checkin_date" class="form-control" placeholder="Date to">
                                </div>

                                <div class="form-group">
                                    <div class="range-slider">
                                    <span>
                                        <input type="number" value="25000" min="0" max="120000"/>-
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
                </div>

                <div class="col-lg-9">
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
                        @if ($hotel->galleries)
                            <div class="col-md-12 ftco-animate">
                                <div class="single-slider owl-carousel">
                                    @foreach ($hotel->galleries as $image)
                                        <div class="item">
                                            <div class="hotel-img" style="background-image: url({{ asset($image->image) }});"></div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
                            <span>Our Best hotels &amp; Rooms</span>

                            <h2>{{ $hotel->name }}</h2>

                            <p class="rate mb-5">
                                <span class="loc">
                                    <a href="#"><i class="icon-map"></i> {{ $hotel->address }}</a>
                                </span>

                                <span class="star">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if($i < $hotel->rating)
                                            <i class="icon-star"></i>
                                        @else
                                            <i class="icon-star-o"></i>
                                        @endif
                                    @endfor

                                    <span>{{ $hotel->rating }} Rating</span>
                                </span>
                            </p>

                            <p>
                                {{ $hotel->description }}
                            </p>
                        </div>

                        <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                            <h4 class="mb-4">Take A Tour</h4>

                            <div class="block-16">
                                <figure>
                                    <img src="{{ asset('images/hotel-6.jpg') }}" alt="Image placeholder" class="img-fluid">

                                    <a href="{{ $hotel->video }}" class="play-button popup-vimeo">
                                        <span class="icon-play"></span>
                                    </a>
                                </figure>
                            </div>
                        </div>

                        @if(count($hotel->rooms) > 0)
                            <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                                    <h4 class="mb-4">Our Rooms</h4>

                                    <div class="row">
                                        @foreach($hotel->rooms as $room)
                                            <div class="col-md-4">
                                                <div class="destination">
                                                    <a href="hotel-single.html" class="img img-2" style="background-image: url({{ asset($room->image) }});"></a>

                                                    <div class="text p-3">
                                                        <div class="d-flex">
                                                            <div class="one">
                                                                <h3><a href="hotel-single.html">{{ $room->name }}</a></h3>

                                                                <p class="rate">
                                                                    @for ($i = 0; $i < 5; $i++)
                                                                        @if($i < $room->rating)
                                                                            <i class="icon-star"></i>
                                                                        @else
                                                                            <i class="icon-star-o"></i>
                                                                        @endif
                                                                    @endfor

                                                                    <span>{{ $room->rating }} Rating</span>
                                                                </p>
                                                            </div>

                                                            <div class="two">
                                                                <span class="price per-price">${{ $room->price }}<br><small>/night</small></span>
                                                            </div>
                                                        </div>

                                                        <p>{{ $room->description }}</p>

                                                        <hr>

                                                        <p class="bottom-area d-flex">
                                                            <span><i class="icon-map-o"></i> {{ $room->address }}</span>

                                                            <span class="ml-auto"><a href="#">Book Now</a></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                        @endif

                        <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                            <h4 class="mb-5">Check Availability &amp; Booking</h4>

                            <form name="form_available" method="post" action="{{ route('check.available') }}">
                                @csrf

                                <div class="fields">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input name="name" type="text" class="form-control" placeholder="Name">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input name="email" type="text" class="form-control" placeholder="Email">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input name="date_from" type="text" class="form-control checkin_date" placeholder="Date from">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input name="date_to" type="text" class="form-control checkout_date" placeholder="Date to">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="select-wrap one-third">
                                                    <div class="icon">
                                                        <span class="ion-ios-arrow-down"></span>
                                                    </div>

                                                    <select name="guest_count" id="" class="form-control" placeholder="Guest">
                                                        <option value="0">Guest</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="select-wrap one-third">
                                                    <div class="icon">
                                                        <span class="ion-ios-arrow-down"></span>
                                                    </div>

                                                    <select name="children_count" id="" class="form-control" placeholder="Children">
                                                        <option value="0">Children</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" value="Check Availability" class="btn btn-primary py-3">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
                            <h4 class="mb-4">Review &amp; Ratings</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="{{ route('send.hotel.rating') }}" method="post" class="star-rating">
                                        @csrf

                                        <input type="hidden" name="hotel_slug" value="{{ $hotel->slug }}">

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

                        @if (count($hotel->child_hotels) > 0)
                            <div class="col-md-12 hotel-single ftco-animate mb-5 mt-5">
                                    <h4 class="mb-4">Related Hotels</h4>

                                    <div class="row">
                                        @foreach($hotel->child_hotels as $related)
                                            <div class="col-md-4">
                                                <div class="destination">
                                                    <a href="{{ route('hotel', ['slug' => $related->slug]) }}" class="img img-2" style="background-image: url({{ $related->galleries[0]->image }});"></a>

                                                    <div class="text p-3">
                                                        <div class="d-flex">
                                                            <div class="one">
                                                                <h3><a href="{{ route('hotel', ['slug' => $hotel->slug]) }}">{{ $related->name }}</a></h3>

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
                                                                <span class="price per-price">${{ $related->price }}<br><small>/night</small></span>
                                                            </div>
                                                        </div>

                                                        <p>{{ $related->price }}</p>

                                                        <hr>

                                                        <p class="bottom-area d-flex">
                                                            <span><i class="icon-map-o"></i> {{ Str::limit($hotel->address, 10, '...') }}</span>

                                                            <span class="ml-auto"><a href="#">Book Now</a></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                        @endif
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section>
@endsection
