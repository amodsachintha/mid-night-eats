<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $cartCount = Auth::user()->cartItems->count() + Auth::user()->cartMenus->count();
        $activeOrderCount = Auth::user()->orders->whereIn('status', [1, 2])->count();
        $activeOrders = Auth::user()->orders->whereIn('status', [1, 2]);
        return view('profile.index', [
            'title' => 'Profile',
            'cartCount' => $cartCount,
            'user' => Auth::user(),
            'activeOrderCount' => $activeOrderCount,
            'activeOrders'=>$activeOrders
        ]);
    }

    public function orders()
    {
        $cartCount = Auth::user()->cartItems->count() + Auth::user()->cartMenus->count();
        $activeOrderCount = Auth::user()->orders->whereIn('status', [1, 2])->count();
        $orders = Auth::user()->orders;
        return view('profile.index', [
            'title' => 'Profile',
            'cartCount' => $cartCount,
            'user' => Auth::user(),
            'orders' => $orders,
            'activeOrderCount' => $activeOrderCount
        ]);
    }

    public function settings()
    {
        $cartCount = Auth::user()->cartItems->count() + Auth::user()->cartMenus->count();
        $activeOrderCount = Auth::user()->orders->whereIn('status', [1, 2])->count();
        return view('profile.index', [
            'title' => 'Profile',
            'cartCount' => $cartCount,
            'user' => Auth::user(),
            'activeOrderCount' => $activeOrderCount
        ]);
    }

    public function uploadAvatar(Request $request)
    {
        $filename = $request->get('filepond');
        if (file_exists(storage_path('app/tmp/' . $filename))) {
            $user = Auth::user();
            rename(storage_path('app/tmp/' . $filename), public_path('img/avatars/thumbnails/' . $filename));
            try {
                unlink(public_path('img/avatars/thumbnails/' . $user->avatar));
            } catch (\Exception $exception) {
                toastr()->error('Server Error!');
                return back();
            }
            $user->avatar = $filename;
            $user->save();
            toastr()->success('Profile Image updated!');
            return back();
        }
        toastr()->error('Server Error!');
        return back();
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->toArray() as $error) {
                toastr()->error($error[0]);
            }
            return back();
        }

        if (!Hash::check($request->get('current_password'), Auth::user()->getAuthPassword())) {
            toastr()->error('Current password does not match the given input!');
            return back();
        }

        if (Hash::check($request->get('password'), Auth::user()->getAuthPassword())) {
            toastr()->error('New password cannot be the current password!');
            return back();
        }

        $user = Auth::user();
        $user->password = Hash::make($request->get('password'));
        $user->save();
        toastr()->success('Password changed successfully!');
        return back();
    }

    public function updateUserDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'gender' => 'required:in:male,female'
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->toArray() as $error) {
                toastr()->error($error[0]);
            }
            return back();
        }

        $user = Auth::user();
        $user->fname = $request->get('fname');
        $user->lname = $request->get('lname');
        $user->gender = $request->get('gender');
        $user->save();
        toastr()->success('User details updated successfully!');
        return back();
    }


}
