@extends('layouts.app')

@section('content')
    <style>
        .item {
            margin: 3px;
        }

        #owl-demo .item img{
            display: block;
            width: 100%;
            height: auto;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div id="owl-demo" class="owl-carousel owl-theme">
                    <div class="item"><img src="http://www.lorempixel.com/900/300" alt="Owl Image"></div>
                    <div class="item"><img src="http://www.lorempixel.com/900/310" alt="Owl Image"></div>
                    <div class="item"><img src="http://www.lorempixel.com/900/305" alt="Owl Image"></div>
                </div>


                @if(Auth::check())
                    @if(Auth::user()->password == '' || Auth::user()->password == null)

                        <div class="alert alert-danger shadow" role="alert">
                            Please secure your account with a <a href="#" class="btn-link" data-toggle="modal" data-target="#exampleModal">password</a>.
                        </div>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Create new Password</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{route('create.password')}}" method="post">
                                        <div class="modal-body">
                                            @csrf()
                                            <div class="form-group">
                                                <label for="password1" class="col-form-label">Password:</label>
                                                <input type="password" class="form-control form-control-sm" id="password1" name="password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password2" class="col-form-label">Confirm Password:</label>
                                                <input type="password" class="form-control form-control-sm" id="password2" name="password_confirmation" required>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success">Create Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif

                <ul class="nav nav-pills  mb-3 nav-fill" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Items <span
                                    class="badge badge-warning">{{$items->count()}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Menus <span
                                    class="badge badge-warning">{{$menus->count()}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#home" role="tab" aria-controls="profile" aria-selected="false">Meals <span
                                    class="badge badge-warning">{{$menus->count()}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Beverages <span
                                    class="badge badge-warning">{{$menus->count()}}</span></a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="owl-carousel owl-theme" id="owl-carousel-featured">
                            @foreach($items as $item)
                                <div class="item shadow card" style="min-height: 530px">
                                    <img class="card-img-top" src="{{asset('img/items/'.$item->itemImages->first()->url)}}" alt="Card image cap">
                                    <div class="card-body bg-white" style="margin-top: -20px">
                                        <h4 class="card-title">{{$item->name}} <span class="badge badge-warning">Item</span></h4>
                                        <p class="card-text">{{$item->description_sm}}</p>
                                    </div>
                                    <div class="card-footer justify-content-between d-flex">
                                        <button class="btn btn-sm btn-outline-primary"><i class="fal fa-eye"></i></button>
                                        <h3><span class="badge badge-secondary">Rs.{{number_format($item->price,2)}}</span></h3>
                                        <button class="btn btn-sm btn-outline-success"><i class="fal fa-shopping-cart"></i></button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade p-2" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="border: none">
                        <div class="owl-carousel owl-theme" id="owl-carousel-menus">
                            @foreach($menus as $menu)
                                <div class="item shadow card" style="min-height: 550px">
                                    <img class="card-img-top" src="{{asset('img/menus/'.$menu->image)}}" alt="Card image cap" style="width: 100%">
                                    <div class="card-body bg-white" style="margin-top: -20px">
                                        <h4 class="card-title">{{$menu->name}} <span class="badge badge-light">Menu</span></h4>
                                        <p class="card-text">{{$menu->description_sm}}</p>
                                        <ul>
                                            @foreach($menu->items as $item)
                                                <li><a tabindex="0" class="btn-link popover-dismiss" role="button" data-toggle="popover" data-trigger="focus" title="{{$item->name}}"
                                                       data-content="<div class='card'>
                                                       <img class='card-img-top' src='{{asset('img/items/'.$item->itemImages->first()->url)}}' alt='Card image cap'>
                                                       <div class='card-body'>{{$item->description_sm}}</div>
                                                       </div>"
                                                       data-html="true">{{$item->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="card-footer justify-content-between d-flex">
                                        <button class="btn btn-sm btn-outline-primary"><i class="fal fa-eye"></i></button>
                                        <h3><span class="badge badge-secondary">Rs.{{number_format($menu->price,2)}}</span></h3>
                                        <button class="btn btn-sm btn-outline-success"><i class="fal fa-shopping-cart"></i></button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
