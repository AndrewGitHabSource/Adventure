@extends('layouts.app')

@section('content')
    <section class="ftco-section justify-content-end ftco-search">
        <div class="container-wrap ml-auto">
            <div class="row no-gutters">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills justify-content-center text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Flight</a>

                        <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Hotel</a>

                        <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Car Rent</a>
                    </div>
                </div>

                <div class="col-md-12 tab-wrap">
                    <div class="tab-content p-4 px-5" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                            <form action="{{ route('search.flights') }}" class="search-destination">
                                <div class="row">
                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="from">From</label>

                                            <div class="form-field">
                                                <div class="icon">
                                                    <span class="icon-my_location"></span>
                                                </div>

                                                <input name="from" id="from" type="text" class="form-control" placeholder="From">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="#">Where</label>
                                            <div class="form-field">
                                                <div class="icon">
                                                    <span class="icon-map-marker"></span>
                                                </div>

                                                <input name="where" type="text" class="form-control" placeholder="Where">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="#">Check In</label>
                                            <div class="form-field">
                                                <div class="icon">
                                                    <span class="icon-map-marker"></span>
                                                </div>

                                                <input name="date_start" type="text" class="form-control checkin_date" placeholder="Check In">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="#">Check Out</label>
                                            <div class="form-field">
                                                <div class="icon">
                                                    <span class="icon-map-marker"></span>
                                                </div>

                                                <input name="date_end" type="text" class="form-control checkout_date" placeholder="From">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="#">Travelers</label>

                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <div class="icon">
                                                        <span class="ion-ios-arrow-down"></span>
                                                    </div>

                                                    <select name="travelers" id="" class="form-control">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md align-self-end">
                                        <div class="form-group">
                                            <div class="form-field">
                                                <input type="submit" value="Search" class="form-control btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-performance-tab">
                            <form action="{{ route('search.hotels') }}" class="search-destination">
                                <div class="row">
                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="start_date">Check In</label>

                                            <div class="form-field">
                                                <div class="icon">
                                                    <span class="icon-map-marker"></span>
                                                </div>

                                                <input name="start_date" id="start_date" type="text" class="form-control checkin_date" placeholder="Check In">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="end_date">Check Out</label>

                                            <div class="form-field">
                                                <div class="icon">
                                                    <span class="icon-map-marker"></span>
                                                </div>

                                                <input name="end_date" id="end_date" type="text" class="form-control checkout_date" placeholder="From">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="guests">Guest</label>

                                            <div class="form-field">
                                                <div class="select-wrap">
                                                    <div class="icon">
                                                        <span class="ion-ios-arrow-down"></span>
                                                    </div>

                                                    <select name="guests" id="guests" class="form-control">
                                                        <option value="1">1</option>

                                                        <option value="2">2</option>

                                                        <option value="3">3</option>

                                                        <option value="4">4</option>

                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md align-self-end">
                                        <div class="form-group">
                                            <div class="form-field">
                                                <input type="submit" value="Search" class="form-control btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-effect-tab">
                            <form action="{{ route('search.cars') }}" class="search-destination">
                                <div class="row">
                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="#">Where</label>

                                            <div class="form-field">
                                                <div class="icon">
                                                    <span class="icon-map-marker"></span>
                                                </div>

                                                <input name="where" type="text" class="form-control" placeholder="Where">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="#">Check In</label>

                                            <div class="form-field">
                                                <div class="icon">
                                                    <span class="icon-map-marker"></span>
                                                </div>

                                                <input required name="date_start" type="text" class="form-control checkin_date" placeholder="Check In">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md align-items-end">
                                        <div class="form-group">
                                            <label for="#">Check Out</label>

                                            <div class="form-field">
                                                <div class="icon">
                                                    <span class="icon-map-marker"></span>
                                                </div>

                                                <input required name="date_end" type="text" class="form-control checkout_date" placeholder="From">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md align-self-end">
                                        <div class="form-group">
                                            <div class="form-field">
                                                <input type="submit" value="Search" class="form-control btn btn-primary">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="intro ftco-animate">
                        <h3><span>01</span> Travel</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="intro ftco-animate">
                        <h3><span>02</span> Experience</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="intro ftco-animate">
                        <h3><span>03</span> Relax</h3>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">See our latest vacation ideas</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ftco-animate">
                    <a href="#" class="destination-entry img" style="background-image: url({{ asset('images/destination-1.jpg') }});">
                        <div class="text text-center">
                            <h3>Beachfront Scape</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 ftco-animate">
                    <a href="#" class="destination-entry img" style="background-image: url({{ asset('images/destination-2-1.jpg') }});">
                        <div class="text text-center">
                            <h3>Group Holidays</h3>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 ftco-animate">
                    <a href="#" class="destination-entry img" style="background-image: url({{ asset('images/destination-3.jpg') }});">
                        <div class="text text-center">
                            <h3>City Breaks</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-about d-md-flex">
        <div class="one-half img" style="background-image: url({{ asset('images/about.jpg') }});"></div>
        <div class="one-half ftco-animate">
            <div class="heading-section ftco-animate ">
                <h2 class="mb-4">The Best Travel Agency</h2>
            </div>

            <div>
                <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
            </div>
        </div>
    </section>

    <section class="ftco-section services-section bg-light">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="flaticon-yatch"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Special Activities</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="flaticon-around"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Travel Arrangements</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="flaticon-compass"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Private Guide</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services d-block">
                        <div class="icon"><span class="flaticon-map-of-roads"></span></div>
                        <div class="media-body">
                            <h3 class="heading mb-3">Location Manager</h3>
                            <p>A small river named Duden flows by their place and supplies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Most Popular Destination</h2>
                </div>
            </div>
        </div>

        <div class="container-fluid">
                <div class="row">
                @foreach($places as $place)
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                            <div class="destination @if ($loop->iteration % 2 == 0) {{ 'd-md-flex flex-column-reverse' }} @endif">
                                <a href="{{ route('place', ['slug' => $place->slug]) }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset($place->image) }});">
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

                                    <p>{{ $place->description }}</p>

                                    <p class="days"><span>2 days 3 nights</span></p>

                                    <hr>

                                    <p class="bottom-area d-flex">
                                        <span><i class="icon-map-o"></i> {{ $place->address }}</span>

                                        <span class="ml-auto"><a href="#">Discover</a></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url({{ asset('images/bg_1.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="100000">0</strong>
                                    <span>Happy Customers</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="40000">0</strong>
                                    <span>Destination Places</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="87000">0</strong>
                                    <span>Hotels</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 text-center">
                                <div class="text">
                                    <strong class="number" data-number="56400">0</strong>
                                    <span>Restaurant</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4"><strong>Popular</strong> Hotels</h2>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                @foreach($hotels as $hotel)
                    <div class="col-sm col-md-6 col-lg ftco-animate">
                        <div class="destination @if ($loop->iteration % 2 == 0) {{ 'd-md-flex flex-column-reverse' }} @endif">
                            <a href="{{ route('hotel', ['slug' => $hotel->slug]) }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset($hotel->galleries[0]->image) }});">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-link"></span>
                                </div>
                            </a>

                            <div class="text p-3">
                                <div class="d-flex">
                                    <div class="one">
                                        <h3>
                                            <a href="{{ route('hotel', ['slug' => $hotel->slug]) }}">{{ $hotel->name }}</a>
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

                                <p>{{ $hotel->description }}</p>

                                <hr>

                                <p class="bottom-area d-flex">
                                    <span><i class="icon-map-o"></i> {{ Str::limit($hotel->address, 80, '...') }}</span>

                                    <span class="ml-auto">
                                        <a href="#">Book Now</a>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ftco-section testimony-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
                    <h2 class="mb-4">Our satisfied customer says</h2>

                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
                </div>
            </div>
            <div class="row ftco-animate">
                <div class="col-md-12">
                    <div class="carousel-testimony owl-carousel ftco-owl">
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url({{ asset('images/person_1.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                      <i class="icon-quote-left"></i>
                                    </span>
                                </div>

                                <div class="text">
                                    <p class="mb-5">
                                        Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
                                        blind texts.
                                    </p>

                                    <p class="name">Mark Web</p>

                                    <span class="position">Marketing Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url({{ asset('images/person_2.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                      <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">
                                        Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                        there live the blind texts.
                                    </p>

                                    <p class="name">Mark Web</p>

                                    <span class="position">Interface Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url({{ asset('images/person_3.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                      <i class="icon-quote-left"></i>
                                    </span>
                                </div>

                                <div class="text">
                                    <p class="mb-5">
                                        Far far away, behind the word mountains, far from the countries
                                        Vokalia and Consonantia, there live the blind texts.
                                    </p>

                                    <p class="name">Mark Web</p>

                                    <span class="position">UI Designer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url({{ asset('images/person_1.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                      <i class="icon-quote-left"></i>
                                    </span>
                                </div>

                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>

                                    <p class="name">Mark Web</p>

                                    <span class="position">Web Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url({{ asset('images/person_1.jpg') }})">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                      <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text">
                                    <p class="mb-5">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p class="name">Mark Web</p>
                                    <span class="position">System Analyst</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2 class="mb-4">Recommended Restaurants</h2>
                </div>
            </div>

            <div class="row">
                @foreach($restaurants as $restaurant)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="destination @if ($loop->iteration % 2 == 0) {{ 'd-md-flex flex-column-reverse' }} @endif">
                            <a href="{{ route('restaurant', ['slug' => $restaurant->slug]) }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset('images/restaurant-1.jpg') }});">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-link"></span>
                                </div>
                            </a>

                            <div class="text p-3">
                                <h3><a href="{{ route('restaurant', ['slug' => $restaurant->slug]) }}">{{ $restaurant->name }}</a></h3>

                                <p class="rate">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if($i < $restaurant->rating)
                                            <i class="icon-star"></i>
                                        @else
                                            <i class="icon-star-o"></i>
                                        @endif
                                    @endfor

                                    <span>{{ $restaurant->rating }} Rating</span>
                                </p>

                                <p>{{ Str::limit($hotel->description, 100, '...') }}</p>

                                <hr>

                                <p class="bottom-area d-flex">
                                    <span><i class="icon-map-o"></i> {{ $restaurant->address }}</span>

                                    <span class="ml-auto"><a href="#">Discover</a></span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h2><strong>Tips</strong> &amp; Articles</h2>
                </div>
            </div>
            <div class="row d-flex">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20" style="background-image: url({{ asset('images/image_1.jpg') }});">
                        </a>
                        <div class="text">
                            <span class="tag">Tips, Travel</span>
                            <h3 class="heading mt-3"><a href="#">8 Best homestay in Philippines that you don't miss out</a></h3>
                            <div class="meta mb-3">
                                <div><a href="#">October 3, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20" style="background-image: url('{{ asset('images/image_2.jpg') }}');">
                        </a>
                        <div class="text">
                            <span class="tag">Culture</span>
                            <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                            <div class="meta mb-3">
                                <div><a href="#">October 3, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a href="blog-single.html" class="block-20" style="background-image: url({{ asset('images/image_3.jpg') }});">
                        </a>
                        <div class="text">
                            <span class="tag">Tips, Travel</span>
                            <h3 class="heading mt-3"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                            <div class="meta mb-3">
                                <div><a href="#">October 3, 2018</a></div>
                                <div><a href="#">Admin</a></div>
                                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

