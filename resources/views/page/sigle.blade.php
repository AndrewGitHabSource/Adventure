@extends('layouts.app')

@section('content')
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ftco-animate">
                    <h2 class="mb-3">{{ $page->title }}</h2>

                    <img style="max-width: 100%;" src="{{ asset($page->image) }}">

                    {!! $page->description !!}
                </div>
            </div>
        </div>
    </section>
@endsection