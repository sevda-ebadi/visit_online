<?php

namespace App\Services\TwoFactor;

use App\TwoFactor;
use App\User;
use Illuminate\Http\Request;

class TwoFactorAuthenticate
{
    protected $request;

    public function __construct(\Illuminate\Support\Facades\Request $request)
    {
        $this->request = $request;
    }

    public function requestCode(User $user)
    {
        // generate code
        $code = TwoFactor::generateCodeFor($user);

        // send code
        $code->send();
        
    }

    public function activate(Request $request)
    {
        // validate code
        $code = TwoFactor::where('user_id', auth()->user()->id)->where('code', $request->code)->first();

        if ($code == null) {
            return back()->withErrors(['کد ارسالی شما درست نمیباشد']);
        }

        // update user two_factor
        $user = auth()->user();
        $user->has_two_factor = true;
        $user->save();


        // delte code
        $code->delete();

    }
}