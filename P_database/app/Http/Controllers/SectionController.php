<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Doctor;
use App\Http\Requests\SectionRequest;
use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sections = Section::all();
        $title = 'sections';
        return view('admin_admin.sections.sections', ['sections'=>$sections, 'title'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'sections';
        $clinics = Clinic::all();
        return view('admin_admin.sections.create_section', ['title'=>$title, 'clinics'=>$clinics]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        //
        $section = Section::create([
            'clinic_id'=>$request->clinic_id,
            'number_of_bed'=>$request->number_of_bed,
            'name'=>$request->name,
        ]);


        session()->flash('success_message', ' ایجاد بخش به نام '.$section->name.'  با موفقیت انجام شد ');
        return redirect()->route('sections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        //
        $title = 'sections';
        $clinics = Clinic::all();
        return view('admin_admin.sections.edit_section', ['title'=>$title, 'section'=>$section, 'clinics'=>$clinics]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(SectionRequest $request, Section $section)
    {
        //
        $section->name = $request->name;
        $section->number_of_bed = $request->number_of_bed;
        $section->clinic_id = $request->clinic_id;

        $section->save();

        session()->flash('success_message', ' ویرایش بخش به نام '.$section->name.'  با موفقیت انجام شد ');
        return redirect()->route('sections.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        //
        $section->delete();
        session()->flash('success_message', ' حذف بخش به نام '.$section->name.'  با موفقیت انجام شد ');
        return redirect()->route('sections.index');
    }

    public function section_doctors($section_id)
    {
        $section = Section::whereId($section_id)->first();
        $doctors = $section->doctors()->get();
        $title = 'doctors';
        $description = $section->name;
        return view('admin_admin.doctors.doctors', ['doctors'=>$doctors, 'title'=>$title, 'description'=>$description]);
    }

    public function section_employees($section_id)
    {
        $section = Section::whereId($section_id)->first();
        $employees = $section->employees()->get();
        $title = 'employees';
        $description = $section->name;
        return view('admin_admin.employees.employees', ['employees'=>$employees, 'title'=>$title, 'description'=>$description]);
    }
}
