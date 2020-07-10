<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a Traits which assists in sending these notifications from
    | your application to your users. Feel free to explore this Traits.
    |
    */

    use SendsPasswordResetEmails;

    public function showForgetForm()
    {
        return view('admin_admin.forget_password');
    }

    public function sendResetLink(Request $request)
    {
        // validate form
        $this->validateForm($request);

        // create link
        // send link
        $response = Password::broker()->sendResetLink($request->only('email'));

        if ($response == Password::RESET_LINK_SENT) {
            session()->flash('success_message', 'لینک تغییر رمز عبور با موفقیت ارسال شد.');
            return redirect()->route('clinics.index');
        }

        // redirect
        return back()->withErrors(['ارسال لینک ایمیل برای تغییر رمز ورود با خطا روبه رو شد.']);
    }


    protected function validateForm(Request $request)
    {
        $request->validate([
            'email'=>['required', 'email', 'exists:users']
        ]);
    }
}
