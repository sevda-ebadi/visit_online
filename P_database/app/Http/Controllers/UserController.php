<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::with('roles')->get();
        $title = 'users';
        return view('admin_admin.users.users', ['users'=>$users, 'title'=>$title]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        dd($id);
    }

    public function editRolePermissionView($user)
    {
        $user = User::whereId($user)->first();
        $title = 'users';
        $roles = Role::all();
        $permissions = Permission::all();

        $user->load('permissions', 'roles');

        return view('admin_admin.role_permission.role_permission', ['user'=>$user,
            'title'=>$title, 'roles'=>$roles, 'permissions'=>$permissions]);
    }

    public function editRolePermission(Request $request, User $user)
    {
        $permissions = (array) $request->permissions;
        $roles = (array) $request->roles;

        $user->refreshPermissions($permissions);
        $user->refreshRoles($roles);

        // redirect
        session()->flash('success_message', ' کاربر گرامی  '.$user->name.' تغییر نقش و دسترسی های شما با موفقیت انجام شد ');
        return redirect()->route('users.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
