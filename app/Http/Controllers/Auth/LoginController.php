<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        if (strcmp($provider, "facebook") != 0) {
            return back();
        }
        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function handleProviderCallback($provider)
    {
//        try {
//            $user = Socialite::driver($provider)->user();
//        } catch (\Exception $exception) {
//            return response()->json(['data' => $exception->getTraceAsString()]);
//        }

        $user = Socialite::driver($provider)->stateless()->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect('/home');
    }

    public function findOrCreateUser($user, $provider)
    {
        toastr()->success('Logged in via '. $provider);
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        if (!is_null($user->avatar_original)) {
            $p_image = Image::make($user->avatar_original);
            $filename = md5(random_bytes(8)) . '.png';

//            $p_image->resize(800, null, function ($constraint) {
//                $constraint->aspectRatio();
//            })->save(public_path('img/avatars/originals/' . $filename));

            $p_image->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('img/avatars/thumbnails/' . $filename));
        } else {
            $filename = 'user-default.png';
        }
        $newUser = new User();
        if (Str::contains($user->name, ' ')) {
            $newUser->fname = Str::before($user->name, ' ');
            $newUser->lname = Str::after($user->name, ' ');
        } else {
            $newUser->fname = $user->name;
            $newUser->lname = '';
        }

        $newUser->email = $user->email;
        $newUser->provider = $provider;
        $newUser->provider_id = $user->id;
        $newUser->avatar = $filename;
        $newUser->type = 'user';
        $newUser->save();
        $newUser->markEmailAsVerified();
        return $newUser;
    }

}
