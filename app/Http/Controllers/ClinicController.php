<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Http\Requests\ClinicRequest;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        if(auth()->user()->roles()->first() != null) {
                    if (auth()->user()->roles()->first()->name == "admin") {

                        try {
                                    $clinics =  Clinic::all();
                                    $title = 'clinics';
                                    return view('admin_admin/clinics/clinics', ['clinics'=>$clinics, 'title'=>$title]);
                                } catch (\Exception $e) {
                                    $this->exceptions->report($e);
                                }
                    }
                }

                return redirect()->route('site_index');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'clinics';
        return view('admin_admin.clinics.create_clinic', ['title'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClinicRequest $request)
    {
        //
        try {
            $clinic = Clinic::create([
                'name'=>$request->name,
                'address'=>$request->address
            ]);

            session()->flash('success_message', ' ایجاد کلینیک به نام '.$clinic->name.'  با موفقیت انجام شد ');
            return redirect()->route('clinics.index');
        } catch (\Exception $e) {
            $this->exceptions->report($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic $clinic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $clinic)
    {
        //
        $title = 'clinics';
        return view('admin_admin.clinics.edit_clinic', ['clinic'=>$clinic, 'title'=>$title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function update(ClinicRequest $request, Clinic $clinic)
    {
        //
        try {
            $clinic->name = $request->name;
            $clinic->address = $request->address;
            $clinic->save();

            session()->flash('success_message', ' ویرایش کلینیک به نام '.$clinic->name.'  با موفقیت انجام شد ');
            return redirect()->route('clinics.index');
        } catch (\Exception $e) {
            $this->exceptions->report($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clinic  $clinic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic)
    {
        //
        try {
            $clinic->delete();
            session()->flash('success_message', ' حذف کلینیک به نام '.$clinic->name.'  با موفقیت انجام شد ');
            return redirect()->route('clinics.index');
        } catch (\Exception $e) {
            $this->exceptions->report($e);
        }
    }

    public function clinic_sections($clinic_id)
    {
        try {
            $clinic = Clinic::whereId($clinic_id)->first();
            $sections = Section::where('clinic_id', $clinic_id)->get();
            $title = 'sections';
            $description = $clinic->name;
            return view('admin_admin.sections.sections', ['sections'=>$sections, 'title'=>$title, 'description'=>$description]);
        } catch (\Exception $e) {
            $this->exceptions->report($e);
        }
    }
}
