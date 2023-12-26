<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\UserExists;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    // protected function validateLogin(Request $request)
    // {
    //     $request->validate([
    //         $this->username() => ['required', 'string', 'email', new UserExists],
    //         'password' => ['required', 'string'],
    //     ]);
    // }
    /**
     * Override login function for login with email or username.
     */
    public function login(Request $request)
    {
        // dd($request);
        $request->validate([
            $this->username() => ['required', 'string', 'email', new UserExists],
            'password' => ['required', 'string'],
        ]);

        $email = $request->get('email');
        $password = $request->get('password');
        $remember_me = $request->remember;

        $user = User::where('email', $email)->first();
        $login_type = filter_var($email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($user->status) {
            if (Auth::attempt([$login_type => $email, 'password' => $password], $remember_me)) {
                //Auth successful here
                return redirect()->intended($this->redirectPath());
            } else {
                return redirect()->back()
                    ->withInput()
                    ->withErrors([
                        'login_error' => 'These credentials do not match our records.',
                    ]);
            }
        } else {
            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'login_error' => 'These Account is Inactive',
                ]);
        }
    }
}
