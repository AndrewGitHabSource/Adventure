<div class="row">
    @if($places)
        @foreach($places as $place)
            <div class="col-sm col-md-6 col-lg-4">
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
            {{ $places->appends(request()->except('_token'))->links() }}
        </div>
    </div>
</div>

<img class="loader" src="{{ asset('images/loading.gif') }}">