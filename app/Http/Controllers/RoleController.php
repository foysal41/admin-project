<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::get();
        return view('role-permission.role.index' , [
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role-permission.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|min:3',
       ]);

     Role::create([
        'name' => $request->name
     ]);
     return redirect('roles')->with('status' , 'Role has been created');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(role $role)
    {
        return view('role-permission.role.edit' , [
            'role' => $role
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, role $role)
    {
        $request -> validate([
            'name' => 'required|string|min:3|unique:roles,name,'.$role->id
        ]);

        $role->update([
            'name' => $request->name
        ]);

        return redirect('roles')->with('status' , 'Role Update has been Updated');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($rolesId)
    {
        $role = role::find($rolesId);
        $role -> delete();
        return redirect('roles')->with('status' , 'Role Update has been delete');

    }
}
