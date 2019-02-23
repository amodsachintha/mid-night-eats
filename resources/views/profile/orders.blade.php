<div class="card shadow">
    <div class="card-header bg-white">
        My Orders
    </div>
    <div class="card-body" align="center">
        @if($orders->count() == 0)
            <img src="{{asset('img/site/nothing-here.jpg')}}" width="30%">
        @else
            <div class="card">
                <div class="card-body pl-1 pr-1">
                    <table id="ordersTable" class="table table-hover table-responsive-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Order Code</th>
                            <th>Payment Status</th>
                            <th>Amount</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->order_code}}</td>

                                @php
                                    if($order->payment_status == 1){
                                    $paymentStatusHtml = "<span class='badge badge-pill badge-warning text-dark'>pending</span>";
                                    }
                                    elseif($order->payment_status == 2){
                                    $paymentStatusHtml = "<span class='badge badge-pill badge-success text-dark'>complete</span>";
                                    }
                                    else{
                                    $paymentStatusHtml = "<span class='badge badge-pill badge-danger text-dark'>cancelled</span>";
                                    }
                                @endphp
                                <td class="text-center"><span class="badge badge-dark" data-toggle="tooltip" data-placement="top"
                                                              title="{{$order->payment_type == 'CC'? 'Credit/Debit Card' : 'Cash on Delivery'}}">{{$order->payment_type}} </span> {!! $paymentStatusHtml !!}
                                </td>
                                <td>Rs. {{number_format($order->amount,2)}}</td>
                                <td>{{$order->created_at->toFormattedDateString()}}</td>
                                @php
                                    if($order->status == 1){
                                        $orderStatusHtml = "<span class='badge badge-pill badge-info text-dark'>processing</span>";
                                    }elseif ($order->status == 2){
                                    $orderStatusHtml = "<span class='badge badge-pill badge-warning text-dark'>awaiting delivery</span>";
                                    }
                                    else{
                                    $orderStatusHtml = "<span class='badge badge-pill badge-success text-dark'>completed</span>";
                                    }
                                @endphp
                                <td class="text-center">{!! $orderStatusHtml !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Order Code</th>
                            <th>Payment Status</th>
                            <th>Amount</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        @endif
    </div>
    <script>
        $(document).ready(function () {
            $('#ordersTable').DataTable();
        });
    </script>
</div>