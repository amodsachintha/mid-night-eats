<div class="card shadow-sm">
    <div class="card-header bg-white">
        My Orders
    </div>
    <div class="card-body" align="center">
        @if($orders->count() == 0)
            <img src="{{asset('img/site/nothing-here.jpg')}}" width="30%">
        @else
            <div class="card mb-2">
                <div class="card-body pl-1 pr-1">
                </div>
            </div>
            <div class="card">
                <div class="card-body pl-1 pr-1">
                <table id="ordersTable" class="table table-hover table-responsive-sm table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Order Code</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{str_limit($order->order_code,10)}}</td>
                            <td>{{$order->payment_type}}</td>
                            <td>Rs. {{number_format($order->amount,2)}}</td>
                            <td>{{$order->created_at->toFormattedDateString()}}</td>
                            <td>{{$order->status}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Order Code</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Order Date</th>
                        <th>Status</th>
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