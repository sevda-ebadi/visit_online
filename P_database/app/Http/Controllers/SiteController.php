<?php

namespace App\Http\Controllers;

use App\Clinic;
use App\Medicine;
use App\Section;
use App\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function search(Request $request)
    {
        if($request->word == null) {
            return back()->withErrors('کلمه جستجو خالی است ');
        }

        $word = $request->word;
        $title =' نتایج جستجو برای کلمه : '.$word;

        $clinics = Clinic::where('name', 'LIKE', '%'.$word .'%')
            ->orWhere('address', 'LIKE', '%'.$word .'%')->get();

        $users = User::where('name', 'LIKE', '%'.$word .'%')
            ->orWhere('family', 'LIKE', '%'.$word .'%')->get();

        $medicines = Medicine::where('name', 'LIKE', '%'.$word .'%')
            ->orWhere('amount', 'LIKE', '%'.$word .'%')
            ->orWhere('instruction', 'LIKE', '%'.$word .'%')->get();

        $sections = Section::where('name', 'LIKE', '%'.$word .'%')->get();

        return view('admin_admin.search', ['clinics'=>$clinics, 'users'=>$users,
            'medicines'=>$medicines, 'sections'=>$sections, 'title'=>$title]);
    }
}
