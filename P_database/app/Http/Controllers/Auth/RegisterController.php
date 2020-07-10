<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a Traits to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'size:11', 'unique:users', 'regex:/^[0]{1}[9]{1}\d{9}$/'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone'=>$data['phone']
        ]);
    }

    protected function createPatient($id) {
        Patient::create([
           'user_id'=>$id
        ]);
    }

    public function showRegistrationForm()
    {
        return view('admin_admin.register');
    }

    public function register(Request $request)
    {
        // validate
        $this->validator($request->all())->validate();

        // store user
        $user = $this->create($request->all());

        // login user
        Auth::login($user);

        $this->createPatient($user->id);

//        $user->sendEmailVerificationNotification();
        // instead of above line of code
        // we can do bellow code
        // use event handling
        event(new UserRegistered($user));



        // redirect
        session()->flash('success_message', ' کاربر گرامی  '.$user->name.' ثبت نام شما  با موفقیت انجام شد ');
        return redirect()->route('clinics.index');

    }
}
