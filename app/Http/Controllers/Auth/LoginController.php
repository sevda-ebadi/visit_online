<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Rules\Recaptcha;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
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
    | redirecting them to your home screen. The controller uses a Traits
    | to conveniently provide its functionality to your applications.
    |
    */

    use ThrottlesLogins;

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

    public function showLoginForm()
    {
        return view('admin_admin.login');
    }

    // login
    public function login(Request $request)
    {
        // validate
        $this->validateForm($request);


        if ($this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }


        if ($this->attemptLogin($request)) {
            return $this->loginAndRedirect();
        }

        $this->incrementLoginAttempts($request);
        return back()->withErrors('کاربردی با این مشخصات یافت نشد');

        // redirect to home
    }

    protected function validateForm(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users'],
            'password'=>['required'],
            //'g-recaptcha-response'=>['required', new Recaptcha],
        ]);
    }

    protected function attemptLogin(Request $request) {
        return Auth::attempt($request->only('email', 'password'), $request->filled('remember'));
    }

    protected function loginAndRedirect() {
        // to regenerate sessions
        session()->regenerate();
        // redirect
        session()->flash('success_message', 'خوش آمدید');

        if(auth()->user()->roles()->first() != null) {
            if (auth()->user()->roles()->first()->name == "admin") {

                return redirect()->route('clinics.index');
            }
        }

        return redirect()->route('site_index');
    }

    protected function username() {
        return 'email';
    }




















    // logout section
    protected function guard()
    {
        return Auth::guard();
    }

    public function logout(Request $request)
    {

        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // redirect
        session()->flash('success_message', 'خدا نگهدار');
        return redirect()->route('index');
    }
}
