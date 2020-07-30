<?php

namespace App\Http\Controllers;

use App\Rules\Recaptcha;
use App\Services\TwoFactor\TwoFactorAuthenticate;
use Illuminate\Http\Request;

class TwoFactorController extends Controller
{
    public function __construct()
    {
        $this->middleware( ['twoFactorMiddleware', 'auth', 'hasPhoneMiddleware']);
    }

    //
    public function toggle()
    {
        return view('admin_admin.two_factor.toggle');
    }

    public function activate(Request $request,TwoFactorAuthenticate $twoFactorAuthenticate)
    {
        $this->validateForm($request);

        $twoFactorAuthenticate->requestCode(auth()->user());

        session()->flash('success_message', 'کد احراز هویت برای شما پیامک شد.');
        return redirect()->route('auth.two.enter.code.form');
    }

    protected function validateForm(Request $request)
    {
        $request->validate([
            'g-recaptcha-response'=>['required', new Recaptcha],
        ]);
    }

    public function enterCodeForm()
    {
        return view('admin_admin.two_factor.enter_form');
    }

    public function confirmCode(Request $request, TwoFactorAuthenticate $twoFactorAuthenticate)
    {
        // validate form
        $this->validateCode($request);

        $twoFactorAuthenticate->activate($request);

        // redirect
        session()->flash('success_message', 'اکانت شما تایید شد متشکریم');
        return redirect()->route('clinics.index');
    }

    protected function validateCode(Request $request)
    {
        $request->validate([
            'code'=>['required', 'numeric', 'digits:4'],
            'g-recaptcha-response'=>['required', new Recaptcha]
        ],[
            'code.digits' => 'کد شما نامعتبر میباشد'
        ]);
    }
}
