<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials/head')
</head>

<body>
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

@include('partials/header')

@yield('content')

@include('partials/footer')
</body>
</html>