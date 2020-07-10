<?php

namespace App\Services\Traits;

trait MagicallyToken
{
    public function magicToken()
    {
        return $this->hasOne(\App\LoginToken::class);
    }

    public function createToken()
    {
        $this->magicToken()->delete();

        return $this->magicToken()->create([
            'token'=> \Illuminate\Support\Str::random(50)
        ]);
    }
}