<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Http\Requests\EmployeeEditRequest;
use App\Http\Requests\EmployeeRequest;
use App\Salary;
use App\Section;
use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employees = Employee::all();
        $title = 'employees';
        return view('admin_admin.employees.employees', ['employees'=>$employees, 'title'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sections = Section::all();
        $title = 'employees';
        return view('admin_admin.employees.create_employee', ['sections'=>$sections, 'title'=>$title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        //
        $user = User::create([
            'name'=>$request->name,
            'family'=>$request->family,
            'sex'=>$request->sex,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password),
        ]);
        Employee::create([
            'user_id'=>$user->id,
            'section_id'=>$request->section_id,
            'degree'=>$request->degree,
            'type'=>$request->type,
            'marriage'=>$request->marriage,
            'number_of_child'=>$request->number_of_child,
        ]);
        session()->flash('success_message', ' ایجاد کادر درمانی به نام '.$user->name.' '.$user->family.'  با موفقیت انجام شد ');
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        $title = 'employees';
        $sections = Section::all();
        return view('admin_admin.employees.edit_employee', ['employee'=>$employee, 'title'=>$title, 'sections'=>$sections]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeEditRequest $request, Employee $employee)
    {
        //
        $user = $employee->user()->first();
        $user->name = $request->name;
        $user->family = $request->family;
        $user->phone = $request->phone;
        $user->sex = $request->sex;
        $user->save();

        $employee->section_id = $request->section_id;
        $employee->marriage = $request->marriage;
        $employee->type = $request->type;
        $employee->degree = $request->degree;
        $employee->number_of_child = $request->number_of_child;
        $employee->save();

        session()->flash('success_message', ' ویرایش کادر درمانی به نام '.$user->name.' '.$user->family.'  با موفقیت انجام شد ');
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        $user = $employee->user()->first();
        session()->flash('success_message', ' حذف کادر درمانی به نام '.$user->name.' '.$user->family.'  با موفقیت انجام شد ');
        return redirect()->route('employees.index');
    }

    public function employee_salary($employee_id)
    {
        $employee = Employee::whereId($employee_id)->first();
        $salaries = $employee->salaries()->get();
        $title = 'salaries';
        $description = $employee->user()->first()->name.' '.$employee->user()->first()->family;
        return view('admin_admin.salaries.salaries', ['salaries'=>$salaries, 'title'=>$title, 'description'=>$description]);
    }
}
