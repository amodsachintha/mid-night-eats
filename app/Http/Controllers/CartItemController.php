<?php

namespace App\Http\Controllers;

use App\CartItem;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartItemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function addToCart(Request $request)
    {
        $id = $request->get('id');
        $item = Item::find($id);
        if ($item instanceof Item) {
            $cartItems = CartItem::where(['user_id' => Auth::id(), 'item_id' => $item->id])->get();
            if ($cartItems->count() == 0) {
                $cartItem = new CartItem([
                    'user_id' => Auth::id(),
                    'item_id' => $item->id,
                    'quantity' => 1
                ]);
                $cartItem->save();
            } else {
                $cartItem = $cartItems->first();
                $cartItem->quantity = $cartItem->quantity + 1;
                $cartItem->save();
            }
            $cartCount = Auth::user()->cartItems->count() + Auth::user()->cartMenus->count();
            return response()->json([
                'status' => 'ok',
                'msg' => 'Item added to cart successfully!',
                'item' => $cartItem->item->name,
                'cartCount' => $cartCount,
            ], 201);
        } else {
            return response()->json([
                'status' => 'fail',
                'msg' => 'Item not found!',
            ], 200);
        }

    }

    public function removeFromCart(Request $request)
    {
        $id = $request->get('id');
        $cartItem = CartItem::find($id);
        if ($cartItem instanceof CartItem) {
            $item = $cartItem->item;
            try {
                $cartItem->delete();
                toastr()->success($item->name . ' removed from cart successfully!');
                return response()->json([
                    'status' => 'ok',
                ], 200);
            } catch (\Exception $exception) {
                toastr()->error('Operation failed: Server Error');
                return response()->json([
                    'status' => 'fail',
                ], 200);
            }
        } else {
            toastr()->error('Item not in cart!');
            return response()->json([
                'status' => 'fail',
            ], 200);
        }
    }

    public function updateQuantity(Request $request)
    {
        $id = $request->get('id');
        $quantity = intval($request->get('quantity'));
        if (!$this->validateQuantity($quantity, 25)) {
            return response()->json([
                'status' => 'fail',
                'msg' => 'Invalid Quantity!'
            ], 200);
        }
        $cartItem = CartItem::find($id);
        if ($cartItem instanceof CartItem) {
            $item = $cartItem->item;
            $cartItem->quantity = $quantity;
            $cartItem->save();
            toastr()->success($item->name . '\'s quantity updated successfully!');
            return response()->json([
                'status' => 'ok',
            ], 200);
        } else {
            return response()->json([
                'status' => 'fail',
                'msg' => 'Failed to find Item :('
            ], 200);
        }
    }

    private function validateQuantity($quantity, $max, $min = 0)
    {
        if ($quantity > $min && $quantity <= $max)
            return true;
        else
            return false;
    }


}
