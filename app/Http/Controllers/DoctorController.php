<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Http\Requests\DoctorEditRequest;
use App\Http\Requests\DoctorRequest;
use App\Section;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors = Doctor::all();
        $title = 'doctors';
        return view('admin_admin/doctors/doctors', ['doctors'=>$doctors, 'title'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title= 'doctors';
        $sections = Section::all();

        return view('admin_admin.doctors.create_doctor',
            ['title'=>$title, 'sections'=>$sections]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        //
        $user = User::create([
            'name'=>$request->name,
            'family'=>$request->family,
            'sex'=>$request->sex,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password),
        ]);
        $doctor = Doctor::create([
            'user_id'=>$user->id,
            'degree'=>$request->degree,
            'field'=>$request->field,
            'marriage'=>$request->marriage,
            'number_of_child'=>$request->number_of_child,
        ]);

        DB::table('doctor_section')->insert([
            'section_id'=>$request->section_id,
            'doctor_id'=>$doctor->id
        ]);
        session()->flash('success_message', ' ایجاد پزشک به نام '.$user->name.' '.$user->family.'  با موفقیت انجام شد ');
        return redirect()->route('doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
        $title= 'doctors';
        $sections = Section::all();

        return view('admin_admin.doctors.edit_doctor',
            ['title'=>$title, 'sections'=>$sections, 'doctor'=>$doctor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorEditRequest $request, Doctor $doctor)
    {
        //
        $user = $doctor->user()->first();
        $user->family = $request->family;
        $user->name = $request->name;
        $user->sex = $request->sex;

        $user->save();

        $doctor->field = $request->field;
        $doctor->degree = $request->degree;
        $doctor->number_of_child = $request->number_of_child;
        $doctor->marriage = $request->marriage;
        $doctor->save();

        session()->flash('success_message', ' ویرایش پزشک به نام '.$user->name.' '.$user->family.'  با موفقیت انجام شد ');
        return redirect()->route('doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        //
        $doctor->delete();
        $user = $doctor->user()->first();
        session()->flash('success_message', ' حذف پزشک به نام '.$user->name.' '.$user->family.'  با موفقیت انجام شد ');
        return redirect()->route('doctors.index');
    }

    public function doctor_salary($doctor_id)
    {
        $doctor = Doctor::whereId($doctor_id)->first();
        $salaries = $doctor->salaries()->get();
        $title = 'salaries';
        $description = $doctor->user()->first()->name.' '.$doctor->user()->first()->family;
        return view('admin_admin.salaries.salaries', ['salaries'=>$salaries, 'title'=>$title, 'description'=>$description]);
    }
}
