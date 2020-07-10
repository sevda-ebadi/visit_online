<?php

namespace App;

use App\Mail\EmailVerification;
use App\Mail\ResetPassword;
use App\Services\Permission\Traits\HasPermissions;
use App\Services\Permission\Traits\HasRoles;
use App\Services\Traits\MagicallyToken;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, MagicallyToken, HasPermissions, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // relation to employees patients and doctors
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function patient()
    {
        return $this->hasOne(Patient::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function code()
    {
        return $this->hasOne(TwoFactor::class);
    }

    // for email verification
    public function sendEmailVerificationNotification()
    {
        \Illuminate\Support\Facades\Mail::to($this->email)
            ->send(new EmailVerification($this));
    }
    
    // for forget password
    public function sendPasswordResetNotification($token)
    {
        \Illuminate\Support\Facades\Mail::to($this->email)
            ->send(new ResetPassword($this, $token));
    }
}
