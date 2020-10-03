@extends('layouts.app')

@section('content')
    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
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

            <div class="row block-9">
                <div class="col-md-12 order-md-last pr-md-5">
                    <h1>Booking Room</h1>

                    <form action="{{ route('booking.save') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <input required name="name" type="text" class="form-control" placeholder="Your Name">
                        </div>

                        <div class="form-group">
                            <input required name="email" type="text" class="form-control" placeholder="Your Email">
                        </div>

                        <div class="form-group">
                            <input required name="phone" type="tel" class="form-control" placeholder="Your Phone">
                        </div>

                        <div class="form-group">
                            <input name="start_date" type="text" id="checkin_date" class="form-control checkin_date" placeholder="Date from">
                        </div>

                        <div class="form-group">
                            <input name="end_date" type="text" id="checkout_date" class="form-control checkout_date" placeholder="Date to">
                        </div>

                        <div class="form-group">
                            <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                        </div>

                        <div class="form-group">
                            <input value="{{ request()->hotel }}" name="hotel_id" type="hidden" class="form-control">
                        </div>

                        <div class="form-group">
                            <input value="{{ request()->room }}" name="room_id" type="hidden" class="form-control">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection