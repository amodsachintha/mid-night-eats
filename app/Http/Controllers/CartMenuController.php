<?php

namespace App\Http\Controllers;

use App\CartMenu;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function addToCart(Request $request)
    {
        $id = $request->get('id');
        $menu = Menu::find($id);
        if ($menu instanceof Menu) {
            $cartMenus = CartMenu::where(['user_id' => Auth::id(), 'menu_id' => $menu->id])->get();
            if ($cartMenus->count() == 0) {
                $cartMenu = new CartMenu([
                    'user_id' => Auth::id(),
                    'menu_id' => $menu->id,
                    'quantity' => 1
                ]);
                $cartMenu->save();
            } else {
                $cartMenu = $cartMenus->first();
                $cartMenu->quantity = $cartMenu->quantity + 1;
                $cartMenu->save();
            }
            $cartCount = Auth::user()->cartItems->count() + Auth::user()->cartMenus->count();
            return response()->json([
                'status' => 'ok',
                'msg' => 'Menu added to cart successfully!',
                'menu' => $cartMenu->menu->name,
                'cartCount' => $cartCount,
            ], 201);
        } else {
            return response()->json([
                'status' => 'fail',
                'msg' => 'Menu not found!',
            ], 404);
        }

    }

    public function removeFromCart(Request $request)
    {
        $id = $request->get('id');
        $cartMenu = CartMenu::find($id);
        if ($cartMenu instanceof CartMenu) {
            $menu = $cartMenu->menu;
            try {
                $cartMenu->delete();
                toastr()->success($menu->name . ' removed from cart successfully!');
                return response()->json([
                    'status' => 'ok',
                ], 200);
            } catch (\Exception $exception) {
                toastr()->error('Operation failed: Server Error');
                return response()->json([
                    'status' => 'fail',
                ], 500);
            }
        } else {
            toastr()->error('Menu not in cart!');
            return response()->json([
                'status' => 'fail',
            ], 404);
        }
    }

    public function updateQuantity(Request $request)
    {
        $id = $request->get('id');
        $quantity = intval($request->get('quantity'));
        if (!$this->validateQuantity($quantity, 20)) {
            return response()->json([
                'status' => 'fail',
                'msg' => 'Invalid Quantity!'
            ], 200);
        }
        $cartMenu = CartMenu::find($id);
        if ($cartMenu instanceof CartMenu) {
            $menu = $cartMenu->menu;
            $cartMenu->quantity = $quantity;
            $cartMenu->save();
            toastr()->success($menu->name . '\'s quantity updated successfully!');
            return response()->json([
                'status' => 'ok',
            ], 200);
        } else {
            return response()->json([
                'status' => 'fail',
                'msg' => 'Failed to find Menu :('
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
