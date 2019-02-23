<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }


    public function markOrderAsComplete(Request $request)
    {
        $order_id = $request->get('id');
        $userOrderCount = Auth::user()->orders()->where('id', $order_id)->count();
        if ($userOrderCount == 0) {
            return response()->json([
                'status' => 'fail',
                'msg' => 'Invalid Order ID!'
            ], 200);
        }

        $userOrder = Auth::user()->orders()->where('id', $order_id)->first();
        $userOrder->status = 3;
        $userOrder->save();
        return response()->json([
            'status' => 'ok',
            'msg' => 'Order ' . $userOrder->order_code . ' marked as complete. Thank you!'
        ], 200);

    }

}
