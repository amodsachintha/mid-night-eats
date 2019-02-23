<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function __construct()
    {
    }

    public function index($id)
    {
        if (Auth::check()) {
            $cartCount = Auth::user()->cartItems->count() + Auth::user()->cartMenus->count();
        } else
            $cartCount = 0;

        $item = Item::find($id);
        if ($item instanceof Item) {
            return view('item.index', [
                'title' => $item->name,
                'cartCount' => $cartCount,
                'item' => $item
            ]);
        } else {
            toastr()->warning('Item does not exist! 🙄');
            return back();
        }
    }
}
