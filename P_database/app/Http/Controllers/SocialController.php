<?php

namespace App\Http\Controllers;

use App\Patient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    //
    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    // todo for github
    public function callbackProvider($driver)
    {
        $user = Socialite::driver($driver)->user();

        Auth::login($user = $this->findOrCreateUser($user, $driver));

        $this->createPatient($user);

        session()->flash('success_message', ' کاربر گرامی  '.$user->name.' ثبت نام/ورود شما  توسط سوشیال مدیا با موفقیت انجام شد ');
        return redirect()->route('clinics.index');
    }


    public function createPatient(User $user)
    {
        Patient::create([
           'user_id'=>$user->id
        ]);
    }

    protected function findOrCreateUser($user, $driver)
    {
        switch ($driver) {
            case 'google' : {
                $providerUser = User::where([
                    'email' => $user->getEmail()
                ])->first();

                if (! is_null($providerUser)) {
                    return $providerUser;
                }

                return User::create([
                    'email' => $user->getEmail(),
                    'name' => $user->getName(),
                    'provider' => $driver,
                    'provider_id' => $user->getId(),
                    'avatar' => $user->getAvatar(),
                    'email_verified_at' => now(),
                ]);

                break;
            }
            case 'github' : {
                $providerUser = User::where([
                    'provider_id' => $user->id
                ])->first();

                if (! is_null($providerUser)) {
                    return $providerUser;
                }

                return User::create([
                    'name' => $user->nickname,
                    'provider' => $driver,
                    'provider_id' => $user->id,
                    'avatar' => $user->avatar,
                    'email_verified_at' => now(),
                ]);
                break;
            }

        }
    }

}
