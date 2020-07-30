<?php

namespace App\Services;

use App\LoginToken;

class MagicAuthenticate
{

    protected $request;

    public function __construct(\Illuminate\Http\Request $request)
    {
        $this->request = $request;
    }


    public function requestLink()
    {
        $user = $this->getUser();

        // generate link and sent token
        $user->createToken()->send();
    }

    protected function getUser() {
        return \App\User::where('email', $this->request->email)->firstOrFail();
    }

}