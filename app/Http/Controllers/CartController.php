<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $cartCount = Auth::user()->cartItems->count() + Auth::user()->cartMenus->count();
        $cartItems = Auth::user()->cartItems;
        $cartMenus = Auth::user()->cartMenus;
        $addresses = Auth::user()->addresses;
        $cartItemSubtotal = 0;
        $cartMenuSubtotal = 0;
        foreach ($cartItems as $cartItem) {
            $cartItemSubtotal += ($cartItem->item->price - $cartItem->item->discount) * $cartItem->quantity;
        }
        foreach ($cartMenus as $cartMenu){
            $cartMenuSubtotal += $cartMenu->menu->price * $cartMenu->quantity;
        }

        return view('cart.index', [
            'title' => 'Shopping Cart',
            'cartCount' => $cartCount,
            'cartItems' => $cartItems,
            'cartMenus' => $cartMenus,
            'addresses' => $addresses,
            'cartItemSubtotal' => $cartItemSubtotal,
            'cartMenuSubtotal' => $cartMenuSubtotal,
            'total' => $cartItemSubtotal+$cartMenuSubtotal,
        ]);
    }

}
