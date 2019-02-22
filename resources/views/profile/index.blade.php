@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="h3 mb-3">{{$title}}</p>
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('profile.profilecard')
            </div>
            <div class="col-md-9">
                @if(Request::is('profile/overview'))
                    @include('profile.overview')
                @endif
                @if(Request::is('profile/orders'))
                    @include('profile.orders')
                @endif
                    @if(Request::is('profile/settings'))
                        @include('profile.settings')
                    @endif
            </div>
        </div>
    </div>
@endsection
