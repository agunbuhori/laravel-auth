<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Google authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToProvider($provider)
    {
        $signin = Socialite::driver($provider)->redirect();

        return $signin;
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $auth = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        $user = User::where('email', $auth->email)->first();

        if (! $user)
            $user = $this->registerNewUser($auth, $provider);
        
        Auth::login($user, true);

        return redirect('/');
    }

    /**
     * Register new user if not exists.
     *
     * @return \Illuminate\Http\Response
     */
    private function registerNewUser($auth, $provider)
    {
        $user = new User;

        $user->name = $auth->name;
        $user->email = $auth->email;
        $user->email_verified_at = now();
        $user->social = $provider;
        $user->social_id = $auth->id;
        $user->avatar = $auth->avatar;
        $user->password = bcrypt($auth->id);
        $user->save();

        return $user;
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }
}
