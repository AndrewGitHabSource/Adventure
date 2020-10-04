<form action="#" method="post" id="form-filter" class="places-filter">
    <div class="fields">
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

        <div class="form-group">
            <input value="@if (request()->country) {{ request()->country }} @endif" name="country" type="text" class="form-control" placeholder="Destination, Country">
        </div>

        <div class="form-group">
            <input value="@if (request()->city) {{ request()->city }} @endif" name="city" type="text" class="form-control" placeholder="Destination, City">
        </div>

        <h3 class="heading mb-4">Price Range</h3>

        <div class="form-group">
            <div class="range-slider">
                <div class="label-slider" style="display: flex; justify-content: space-between;">
                    <span class="start-price">
                        @if (request()->price_start){{request()->price_start}}@else{{0}}@endif
                    </span> -
                    <span class="end-price">
                        @if (request()->price_end){{ request()->price_end }}@else{{20}}@endif
                    </span>
                </div>

                <input class="price_start" name="price_start" min="0" max="1000" step="1" value="@if (request()->price_start){{request()->price_start}}@else{{0}}@endif" type="range"/>

                <input class="price_end" name="price_end" min="0" max="1000" step="1" value="@if (request()->price_end){{ request()->price_end }}@else{{20}}@endif" type="range"/>
            </div>
        </div>

        <h3 class="heading mb-4">Star Rating</h3>

        <div class="form-check">
            <input @if (request()->rating) @if(in_array(5, request()->rating)) {{ 'checked' }} @endif @endif name="rating[]" value="5" type="checkbox" class="form-check-input" id="exampleCheck1">

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
            <input @if (request()->rating) @if(in_array(4, request()->rating)) {{ 'checked' }} @endif @endif name="rating[]" value="4" type="checkbox" class="form-check-input" id="exampleCheck1">

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
            <input @if (request()->rating) @if(in_array(3, request()->rating)) {{ 'checked' }} @endif @endif name="rating[]" value="3" type="checkbox" class="form-check-input" id="exampleCheck1">

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
            <input @if (request()->rating) @if(in_array(2, request()->rating)) {{ 'checked' }} @endif @endif name="rating[]" value="2" type="checkbox" class="form-check-input" id="exampleCheck1">

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
            <input @if (request()->rating) @if(in_array(1, request()->rating)) {{ 'checked' }} @endif @endif name="rating[]" value="1" type="checkbox" class="form-check-input" id="exampleCheck1">

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