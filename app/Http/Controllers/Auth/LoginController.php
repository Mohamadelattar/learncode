<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    public function handleProviderCallback($service)
    {   
        if($service == "google") {
            $user = Socialite::driver($service)->stateless()->user();
        }else {
            $user = Socialite::driver($service)->user();
        }

        $findUser = User::where('email', $user->getEmail())->first();
        if($findUser) {
            Auth::login($findUser);
        }else {

            $newUser = new User;
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->password = bcrypt(12345678);
            
            if($newUser->save()) {
                Auth::login($newUser);
                return redirect('/');
            } else {
                return abort(404);
            }
        }
        return redirect('/');
    }
}
