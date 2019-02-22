<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title : config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/minty.min.css') }}" rel="stylesheet">
{{--    <link href="{{ asset('css/sandstone.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/united.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ asset('css/matiria.min.css') }}" rel="stylesheet">--}}
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('fa/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-select.min.css')}}">
</head>
<body>

<div id="app">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    {{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel shadow-sm">--}}
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('cart.index')}}">
                                <i class="far fa-shopping-cart fa-2x"></i><span id="cart-count"><strong> {{$cartCount}}</strong></span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span><img src="/img/avatars/thumbnails/{{Auth::user()->avatar}}" width="35px" style="border-radius: 50%; margin-top: -7px"/></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{route('profile.index')}}">My Account</a>




                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>

@include('layouts.footer')

<script src="{{asset('js/axios.min.js')}}" defer></script>
<script src="{{asset('js/owl.carousel.min.js')}}" defer></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
@toastr_render
<script src="{{asset('datatables/datatables.min.js')}}" defer></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}" defer></script>
</body>
</html>
