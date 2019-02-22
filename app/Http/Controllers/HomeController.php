<?php

namespace App\Http\Controllers;

use App\Item;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = Item::where('status',1)->get();
        $menus = Menu::where('status',1)->get();
        if(Auth::check()){
            $cartCount = Auth::user()->cartItems->count() + Auth::user()->cartMenus->count();
        }else
            $cartCount = 0;

        return view('home.home',[
            'title' => 'Home',
            'items' => $items,
            'menus' => $menus,
            'cartCount' => $cartCount,
        ]);
    }
}
