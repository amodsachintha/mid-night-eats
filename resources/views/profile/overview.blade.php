<div class="card shadow">
    <div class="card-header bg-white">
        Overview
    </div>
    <div class="card-body" align="center">
        @if($activeOrderCount == 0)
            <img src="{{asset('img/site/nothing-here.jpg')}}" width="30%">
        @else
            @foreach($activeOrders as $activeOrder)
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-between">
                                <small>{{$activeOrder->order_code}}</small>
                                <small>order placed {{$activeOrder->created_at->diffForHumans()}}</small>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <img src="{{asset('img/site/order-status/processing.png')}}" width="20%"><br>
                                <small>Processing Order</small>
                            </div>
                            <div class="col-sm-4">
                                <img src="{{asset('img/site/order-status/awaiting-delivery.png')}}" width="20%"><br>
                                <small>Awaiting Delivery</small>
                            </div>
                            <div class="col-sm-4">
                                <img src="{{asset('img/site/order-status/complete.png')}}" width="20%"><br>
                                <small>Complete</small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-10 offset-1">
                                <div class="progress">
                                    @php
                                    if($activeOrder->status == 1){
                                    $percentage = '20';
                                    $bg_class = 'bg-warning';
                                    }
                                    elseif($activeOrder->status == 2){
                                    $percentage = '55';
                                    $bg_class = 'bg-info';
                                    }
                                    else{
                                    $percentage = '100';
                                    $bg_class = 'bg-success';
                                    }
                                    @endphp
                                    <div class="progress-bar progress-bar-striped progress-bar-animated {{$bg_class}}" role="progressbar" style="width: {{$percentage}}%" aria-valuenow="{{$percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <small>{{$activeOrder->address->address_line_1}}, {{$activeOrder->address->address_line_2}},
                                {{$activeOrder->address->address_line_3}} </small><br>
                                <small><strong>{{$activeOrder->address->city->name}}</strong></small>

                            </div>
                            <div class="col-sm-6">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-sm-4" align="right">
                                       <img src="/img/drivers/{{$activeOrder->driver->image}}" width="50%">
                                    </div>
                                    <div class="col-sm-8 text-left">
                                        <small>{{$activeOrder->driver->name}}</small><br>
                                        <small>{{$activeOrder->driver->phone}}</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>