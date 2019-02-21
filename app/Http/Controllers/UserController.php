<?php
/**
 * Created by PhpStorm.
 * User: Amod
 * Date: 2/21/2019
 * Time: 2:35 PM
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
}

    public function createPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:6|confirmed',
        ]);



        if ($validator->fails()) {
            foreach ($validator->errors()->toArray() as $error){
//                dd($error);
                toastr()->error($error[0]);
            }
            return back();
        }

        $user = Auth::user();
        $user->password = Hash::make($request->get('password'));
        $user->save();
        toastr()->success('Password added successfully!');
        return redirect('/home')->with(['password_success' => 'Password saved successfully!']);
    }

}