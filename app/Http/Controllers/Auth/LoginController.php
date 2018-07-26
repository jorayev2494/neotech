<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

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
    protected $redirectTo = '/'; // "/home";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

// ================================================================================================================== //

    public function redirectToProvider($provider)
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver('google')->stateless()->user();

        // return ($user->id);
        // dump($user);
        // dump($user->user);
        // dump($user->user["name"]);
        // dd($user->user["name"]["givenName"]);
        
        return $this->findOrCreateUser($user, $provider);
    }

    public function findOrCreateUser($user, $provider) {
        $findEmail = User::whereEmail($user->email)->first();

        if ($findEmail) {
            Auth::login($findEmail);
            return redirect("/");
        } else {

            User::create([
                "provider" => strtoupper($provider),
                // "provider_id" => $user->id,
                "name" => $user["name"]["givenName"],
                "last_name" => $user["name"]["familyName"],
                "email" => $user->email,
                "avatar" => $user->avatar,
                "avatar_original" => $user->avatar_original,
                // "password" => bcrypt($user->id),
                "provider_token" => $user->token,
                "password" => bcrypt(123456),
            ]);

            // Рекурсия
            return $this->findOrCreateUser($user, $provider);
        }
    }

// ================================================================================================================== //
    
}
