<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple Traits to include this behavior. You're free to
    | explore this Traits and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;



    public function showResetForm(Request $request)
    {
        return view('admin_admin.reset_password_form', [
           'email'=>$request->query('email'),
            'token'=>$request->query('token')
        ]);
    }

    public function reset(Request $request)
    {
        // validate
        $this->validateForm($request);

        // check token and email
        $response = Password::broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            // redirect
            session()->flash('success_message', ' کاربر گرامی  '.User::where('email', $request->email)->first()->name.' عملیات تغییر رمز عبور شما  با موفقیت انجام شد ');
            return redirect()->route('clinics.index');
        } else {
            return back()->withErrors(['عملیات تغییر رمز عبور با شکست روبه رو شد']);
        }
    }

    protected function validateForm(Request $request) {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'token'=> ['required', 'string'],
            'email' => ['required', 'email', 'exists:users']
        ]);
    }

    protected function resetPassword($user, $password)
    {
        // reset password
        $user->password = bcrypt($password);
        $user->save();
    }
}
