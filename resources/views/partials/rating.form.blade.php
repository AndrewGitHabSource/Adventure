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
                                <i class="icon-star-o"></i>
                                <i class="icon-star-o"></i>
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