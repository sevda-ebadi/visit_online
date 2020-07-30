<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function showForm()
    {
        $user = auth()->user();
        return view('admin_admin.users.profile', ['user' => $user]);
    }

    public function submitProfile(ProfileRequest $request)
    {
//        dd($request);
        // upload image
        if($request->avatar != null) {
                // first upload image
                $imageName = time().'_'.rand(0, 500).'.'.$request->avatar->getClientOriginalExtension();
                $request->avatar->move(public_path('images'), $imageName);

                auth()->user()->update([
                    'avatar'=>'http://localhost:8000/images/'.$imageName
                ]);
        }

        auth()->user()->update([
           'name'=>$request->name,
           'family'=>$request->family,
           'email'=>$request->email,
           'phone'=>$request->phone,
           'sex'=>$request->sex
        ]);

        // redirect
        session()->flash('success_message', ' کاربر گرامی  '.auth()->user()->name.' ویرایش پروفایل شما با موفقیت انجام شد ');
        return redirect()->route('clinics.index');

    }
}
