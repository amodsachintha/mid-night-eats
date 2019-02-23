@extends('layouts.app')

@section('content')
    <div class="container">
        <p class="h3 mb-3">{{$title}}</p>
        <div class="row justify-content-center">
            <div class="col-md-8">

                {{--*************************--}}
                {{--CART EMPTY--}}
                {{--**************************--}}

                @if($cartCount == 0)
                    <div align="center">
                        <img src="{{asset('img/site/empty-cart.png')}}">
                        <p class="h2">Your Cart is empty</p>
                        <p class="h3 text-danger">add some stuff !!</p>
                    </div>

                @endif

                {{--*************************--}}
                {{--CART STANDALONE ITEMS--}}
                {{--**************************--}}

                @if(Auth::user()->cartItems->count() != 0)
                    <div class="row mb-3">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">Items</div>
                                <div class="card-body">
                                    <div class="list-group">
                                        @foreach($cartItems as $cartItem)
                                            <div class="list-group-item list-group-item-action flex-column align-items-start mb-2">
                                                <div class="row">
                                                    <div class="col-sm-2 mb-2" align="center">
                                                        <img class="img-thumbnail img-fluid rounded" src="/img/items/{{$cartItem->item->itemImages->first()->url}}">
                                                        <p>
                                                            <span class="badge badge-pill badge-secondary">{{$cartItem->item->category->name}}</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <h4 class="h4">{{$cartItem->item->name}}</h4>
                                                            <small class="text-muted">added {{$cartItem->created_at->diffForHumans()}}</small>
                                                        </div>
                                                        <p>
                                                            <label for="cartItem-{{$cartItem->id}}-quantity" class="text-muted">Quantity: </label>
                                                            <input id="cartItem-{{$cartItem->id}}-quantity" type="number" min="1" max="50" style="border-radius: 5px" value="{{$cartItem->quantity}}">
                                                            <button class="btn btn-sm btn-outline-warning" onclick="updateCartQuantity('item','{{$cartItem->id}}')" data-toggle="tooltip"
                                                                    data-placement="bottom" title="Update quantity"><i class="far fa-sync-alt"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-outline-danger" onclick="if(confirm('Are you sure?')) {removeItemFromCart('{{$cartItem->id}}')}"
                                                                    data-toggle="tooltip" data-placement="bottom" title="Remove from cart"><i
                                                                        class="far fa-trash-alt"></i></button>
                                                        </p>
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <h6>
                                                                <span class="badge badge-dark">Rs. {{number_format($cartItem->item->price,2)}} each</span>
                                                                @if($cartItem->item->discount > 0)
                                                                    <span class="badge badge-success">Rs. {{$cartItem->item->discount}} off!</span>
                                                                @endif
                                                            </h6>
                                                            <h4>
                                                                <span class="badge badge-secondary">Rs. {{number_format(($cartItem->item->price - $cartItem->item->discount)*$cartItem->quantity,2)}}</span>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="h5">Subtotal</h5>
                                        <p class="h5"><strong>Rs. {{number_format($cartItemSubtotal,2)}}</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{--*************************--}}
                {{--CART MENUS--}}
                {{--**************************--}}

                @if(Auth::user()->cartMenus->count() != 0)
                    <div class="row mb-3">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">Menus</div>
                                <div class="card-body">
                                    <div class="list-group">
                                        @foreach($cartMenus as $cartMenu)
                                            <div class="list-group-item list-group-item-action flex-column align-items-start mb-2">
                                                <div class="row">
                                                    <div class="col-sm-2 mb-2" align="center">
                                                        <img class="img-thumbnail img-fluid rounded" src="/img/menus/{{$cartMenu->menu->image}}">
                                                    </div>
                                                    <div class="col-sm-10">
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <h4 class="h4">{{$cartMenu->menu->name}}</h4>
                                                            <small class="text-muted">added {{$cartMenu->created_at->diffForHumans()}}</small>
                                                        </div>
                                                        <p>
                                                            <label for="cartMenu-{{$cartMenu->id}}-quantity" class="text-muted">Quantity: </label>
                                                            <input id="cartMenu-{{$cartMenu->id}}-quantity" type="number" min="1" max="50" style="border-radius: 5px" value="{{$cartMenu->quantity}}">
                                                            <button class="btn btn-sm btn-outline-warning" onclick="updateCartQuantity('menu','{{$cartMenu->id}}')" data-toggle="tooltip"
                                                                    data-placement="bottom" title="Update quantity"><i class="far fa-sync-alt"></i>
                                                            </button>
                                                            <button class="btn btn-sm btn-outline-danger" onclick="if(confirm('Are you sure?'))removeMenuFromCart('{{$cartMenu->id}}')"
                                                                    data-toggle="tooltip" data-placement="bottom" title="Remove from cart"><i
                                                                        class="far fa-trash-alt"></i></button>
                                                        </p>
                                                        <div class="d-flex w-100 justify-content-between">
                                                            <h6>
                                                                <span class="badge badge-dark">Rs. {{number_format($cartMenu->menu->price,2)}} each</span>
                                                            </h6>
                                                            <h4><span class="badge badge-secondary">Rs. {{number_format($cartMenu->menu->price*$cartMenu->quantity,2)}}</span>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="h5">Subtotal</h5>
                                        <p class="h5"><strong>Rs. {{number_format($cartMenuSubtotal,2)}}</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{--*************************--}}
            {{--CART SUMMARY--}}
            {{--**************************--}}

            @if($cartCount != 0)
                <div class="col-md-4">
                    <div class="row mb-3">
                        <div class="col">

                            <div class="card shadow">
                                <div class="card-header">
                                    Cart Summary
                                </div>
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <tbody>
                                        <tr>
                                            <td>Items</td>
                                            <td>Rs. {{number_format($cartItemSubtotal,2)}}</td>
                                        </tr>
                                        <tr>
                                            <td>Menus</td>
                                            <td>Rs. {{number_format($cartMenuSubtotal,2)}}</td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th class="h4">Rs. {{number_format($total,2)}}</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">
                                    Select Delivery Address
                                </div>
                                <div class="card-body">
                                    <form action="#">
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between">
                                                <label for="deleiveryAddress">Delivery Address</label>
                                                <small><a href="#">add new address</a></small>
                                            </div>
                                            <select id="deleiveryAddress" class="form-control selectpicker">
                                                @foreach($addresses as $address)
                                                    @php
                                                        $addr = $address->address_line_1 . ', ' .
                                                    $address->address_line_2 . ', ' . $address->address_line_3;
                                                    $city = $address->city->name;
                                                    @endphp
                                                    <option value="{{$address->id}}" data-subtext="{{$city}}" data-icon="far fa-home">{{$addr}}</option>
                                                @endforeach
                                            </select>
                                            <small class="text-danger">*Delivery Charge: Rs. 30.00 (Total: Rs. 865.50)</small>
                                        </div>

                                        <div class="form-group">
                                            <label for="paymentMethod">Payment Method</label>
                                            <select id="paymentMethod" class="form-control selectpicker">
                                                <option data-icon="far fa-credit-card" value="CC">Credit/Debit Card</option>
                                                <option data-icon="far fa-money-bill" value="COD">Cash on Delivery</option>
                                            </select>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <button class="btn btn-success">Checkout!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection