<?php

namespace App\Http\Middleware;

use Closure;

class TwoFactorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()->has_two_factor == false) {
            return $next($request);
        } else {
            session()->flash('success_message', ' کاربر گرامی  '.$request->user()->name.' اکانت شما فعال شده است ');
            return redirect()->route('clinics.index');
        }
    }
}
