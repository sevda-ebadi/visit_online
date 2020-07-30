<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

//    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'send');
    }

    public function send()
    {
        if (auth()->user()->hasVerifiedEmail()) {
            // redirect
            session()->flash('success_message', 'ایمیل شما تایید شده است');
            return redirect()->route('clinics.index');
        }

        auth()->user()->sendEmailVerificationNotification();

        // redirect
        session()->flash('success_message', 'ایمیل اهراز هویت برای شما ارسال شد.');
        return redirect()->route('clinics.index');
    }

    public function verify(Request $request)
    {
        // check email
        if ($request->user()->email != $request->query('email')) {
            throw new AuthorizationException;
        }


        // check email verification
        if ($request->user()->hasVerifiedEmail()) {
            // redirect
            session()->flash('success_message', 'ایمیل شما تایید شده است');
            return redirect()->route('clinics.index');
        }
        // check link

        $request->user()->markEmailAsVerified();

        // redirect
        session()->forget('mustVerifyEmail');
        session()->flash('success_message', 'ایمیل شما تایید شد .');
        return redirect()->route('clinics.index');
    }
}
