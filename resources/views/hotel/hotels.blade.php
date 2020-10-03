@extends('layouts.app')

@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 sidebar order-md-last ftco-animate">
                    <div class="sidebar-wrap ftco-animate">
                        <h3 class="heading mb-4">Find City</h3>

                        @include('partials.filter')
                    </div>
                </div>

                <div class="col-lg-9 ajax-filter">
                    <div class="row">
                        @if (count($hotels))
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
