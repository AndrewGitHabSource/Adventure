@extends('layouts.app')

@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 sidebar order-md-last ftco-animate">
                <div class="sidebar-wrap ftco-animate">
                    <h3 class="heading mb-4">Find City</h3>

                    @include('partials.filter_places')
                </div>
            </div>

            <div class="col-lg-9 ajax-filter">
                @include('place.places_loop', ['places' => $places])
            </div>
        </div>
    </div>
</section>
@endsection