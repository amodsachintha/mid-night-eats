<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $cartCount = Auth::user()->cartItems->count() + Auth::user()->cartMenus->count();
        return view('profile.index', [
            'title' => 'Profile',
            'cartCount' => $cartCount,
            'user' => Auth::user()
        ]);
    }

    public function orders()
    {
        $cartCount = Auth::user()->cartItems->count() + Auth::user()->cartMenus->count();
        $orders = Auth::user()->orders;
        return view('profile.index', [
            'title' => 'Profile',
            'cartCount' => $cartCount,
            'user' => Auth::user(),
            'orders' => $orders
        ]);
    }

    public function settings()
    {
        $cartCount = Auth::user()->cartItems->count() + Auth::user()->cartMenus->count();
        return view('profile.index', [
            'title' => 'Profile',
            'cartCount' => $cartCount,
            'user' => Auth::user()
        ]);
    }
}
