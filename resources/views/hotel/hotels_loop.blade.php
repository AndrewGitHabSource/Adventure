<div class="row">
    @if (count($hotels))
        @foreach ($hotels as $hotel)
            <div class="col-sm col-md-6 col-lg-4">
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
                                <span class="price per-price">${{ $hotel->price }}<br><small>/night</small></span>
                            </div>
                        </div>

                        <p>{{ Str::limit(strip_tags($hotel->description), 180, '...') }}</p>

                        <hr>

                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o"></i> {{ Str::limit($hotel->address, 10, '...') }}</span>

                            <span class="ml-auto"><a href="{{ route('hotel', ['slug' => $hotel->slug]) }}">Book Now</a></span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach

    @else
         <h2>Nothing found !</h2>
    @endif
</div>

<div class="row mt-5">
    <div class="col text-center">
        <div class="block-27">
            {{ $hotels->appends(request()->except('_token'))->links() }}
        </div>
    </div>
</div>

<img class="loader" src="{{ asset('images/loading.gif') }}">
