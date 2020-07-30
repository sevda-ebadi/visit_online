<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmailStatus
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && !$request->user()->hasVerifiedEmail()) {
            session()->flash('mustVerifyEmail', true);
        }
        return $next($request);
    }
}
