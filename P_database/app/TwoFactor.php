<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TwoFactor extends Model
{
    //
    protected $guarded = [];

    public static function generateCodeFor(User $user)
    {
        $user->code()->delete();

        return static::create([
           'user_id' => $user->id,
           'code' => mt_rand(1000, 9999)
        ]);
    }

    public function send()
    {
        // send sms
        // todo send sms

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
