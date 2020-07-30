<?php

namespace App\Http\Controllers;

use App\LoginToken;
use App\Services\MagicAuthenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MagicController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    //
    public function showMagicForm()
    {
        return view('admin_admin.magic.magic_form');
    }

    // send token
    public function sendToken(Request $request, MagicAuthenticate $authenticate)
    {
        // validate
        $this->validateForm($request);
        // generate token and send
        $authenticate->requestLink();

        // redirect
        session()->flash('success_message', 'لینک ورود بدون رمز عبور برای شما ایمیل شد .');
        return back();
    }

    public function validateForm(Request $request)
    {
        $request->validate([
           'email' => ['required', 'email', 'exists:users']
        ]);
    }

    public function login(LoginToken $token, MagicAuthenticate $authenticate)
    {
        if ($token->isExpired()) {
            $token->delete();

            return redirect()->route('magic_form')->withErrors(['تاریخ انقضا لیک شما به پایان رسیده است لطفا مجدد تلاش کنید']);
        } else {
            // login user
            Auth::login($token->user);

            $token->delete();

            // redirect
            session()->flash('success_message','خوش آمیدید');
            return redirect()->route('clinics.index');
        }


    }
}
