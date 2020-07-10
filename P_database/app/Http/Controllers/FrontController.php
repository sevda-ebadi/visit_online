<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Section;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function site_index()
    {
        $clinics = Clinic::paginate(9);
        return view('admin_admin.frontend.site_index', ['clinics'=>$clinics]);
    }

    public function site_sections($clinic_id) {
        $clinic = Clinic::whereId($clinic_id)->first();
        $sections = $clinic->sections()->paginate(9);
        return view('admin_admin.frontend.site_sections', ['sections'=>$sections]);
    }


    public function site_doctors($section_id)
    {
        $section = Section::whereId($section_id)->first();
        $doctors = $section->doctors()->paginate(9);
        return view('admin_admin.frontend.site_doctors', ['doctors'=>$doctors]);
    }
}
