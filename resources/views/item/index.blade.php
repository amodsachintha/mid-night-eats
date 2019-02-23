@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="h3 mb-3">{{$title}}</p>
        <div class="row justify-content-center" style="min-height: 400px">
            <div class="col-md-8">
                <img src="{{asset('img/items/'.$item->itemImages()->first()->url)}}" class="fish" width="50%">
                <img src="{{asset('img/site/items/item-bg.png')}}" width="100%" class="fishes">
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h2 class="h2 text-danger"><strong>{{$item->name}}</strong></h2>
                        @if($item->discount)
                            <h4><span class="badge badge-pill badge-secondary text-dark"><del>Rs. {{number_format($item->price,2)}}</del></span></h4>
                        @endif
                        <p style="font-family: 'Handlee', cursive; font-size: larger;" class="text-dark"><strong>{{$item->description_sm}}</strong></p>

                        <div>
                            @if($item->discount)
                                <h3><span class="badge badge-pill badge-danger d-block">Rs. {{$item->discount}} off !</span></h3>
                                <h1><span class="badge badge-pill badge-warning text-dark d-block">Rs. {{number_format($item->price-$item->discount,2)}} !</span></h1>
                            @else
                                <h1><span class="badge badge-pill badge-warning text-dark d-block">Rs. {{number_format($item->price,2)}} !</span></h1>
                            @endif
                        </div>

                        <button onclick="addItemToCart('{{$item->id}}')" class="btn btn-outline-primary btn-block mt-3">
                            <i class="fas fa-shopping-cart"></i> add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection