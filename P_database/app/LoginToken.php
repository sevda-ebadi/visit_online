<?php

namespace App;

use App\Mail\SendMagicLink;
use Illuminate\Database\Eloquent\Model;

class LoginToken extends Model
{
    const TOKEN_EXPIRE = 600;
    //
    protected $fillable = [
        'token'
    ];

    public function getRouteKeyName()
    {
        return 'token';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function send()
    {
        \Illuminate\Support\Facades\Mail::to($this->user->email)
            ->send(new SendMagicLink($this->user->name, $this->token));
    }

    public function isExpired()
    {
        return $this->created_at->diffInSeconds(now()) > self::TOKEN_EXPIRE ? false : true;
    }
}
