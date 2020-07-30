<?php

namespace App\Http\Middleware;

use Closure;

class HasPhoneMiddleware
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
        if (auth()->user()->phone != null) {
            return $next($request);
        } else {
            session()->flash('success_message', ' کاربر گرامی  '.auth()->user()->name.'برای شما شماره تماسی ثبت نشده .(در قسمت ویرایش پروایل اقدام به افزودن شماره تماس کنید) ');
            return redirect()->route('site_index');
        }
    }
}
