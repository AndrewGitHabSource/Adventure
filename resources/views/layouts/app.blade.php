<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <head>
            @include('partials/head')
        </head>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
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

        @stack('modals')

        @livewireScripts
    </body>
</html>
