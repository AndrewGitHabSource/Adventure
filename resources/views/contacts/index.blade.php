@extends('layouts.app')

@section('content')
    <section class="ftco-section contact-section ftco-degree-bg">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
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

                <div class="col-md-12 mb-4">
                    <h2 class="h4">Contact Information</h2>
                </div>

                <div class="w-100"></div>

                <div class="col-md-3">
                    <p>
                        <span>Address:</span>
                        198 West 21th Street, Suite 721 New York NY 10016
                    </p>
                </div>

                <div class="col-md-3">
                    <p>
                        <span>Phone:</span>
                        <a href="tel://1234567920">+ 1235 2355 98</a>
                    </p>
                </div>

                <div class="col-md-3">
                    <p>
                        <span>Email:</span>
                        <a href="mailto:info@yoursite.com">info@yoursite.com</a>
                    </p>
                </div>

                <div class="col-md-3">
                    <p>
                        <span>Website</span>
                        <a href="#">yoursite.com</a>
                    </p>
                </div>
            </div>

            <div class="row block-9">
                <div class="col-md-6 order-md-last pr-md-5">
                    <form action="{{ route('form.contacts') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Your Name">
                        </div>

                        <div class="form-group">
                            <input name="email" type="text" class="form-control" placeholder="Your Email">
                        </div>

                        <div class="form-group">
                            <input name="subject" type="text" class="form-control" placeholder="Subject">
                        </div>

                        <div class="form-group">
                            <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>
@endsection