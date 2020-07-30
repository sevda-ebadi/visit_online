<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();

        return view('admin_admin.role_permission.roles', ['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin_admin.role_permission.create_role');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        //
        Role::create([
            'name'=>$request->name,
            'persian_name'=>$request->persian_name,
        ]);

        // redirect
        session()->flash('success_message', 'ثبت نقش با موفقیت انجام شد');
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $permissions = Permission::all();
        $role->load('permissions');
        return view('admin_admin.role_permission.edit_role', ['role' => $role,
            'permissions'=>$permissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        $this->validateForm($request, $role->id);

        $role->update($request->only('name', 'persian_name'));

        $role->refreshPermissions($request->permissions);

        // redirect
        session()->flash('success_message', 'ویرایش نقش با موفقیت انجام شد');
        return redirect()->route('roles.index');
    }

    protected function validateForm($request, $role) {
        $request->validate([
            'name'=>'required|unique:roles,name,'.$role,
            'persian_name'=>'required'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
