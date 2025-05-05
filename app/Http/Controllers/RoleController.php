<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        // $roles = Role::with('permissions')->get();
        $roles = Role::all();
        $permissions = Permission::all();
        // dd($roles->permissions->pluck('name'));
        // dd($roles);
        return view('admin.roles', compact('roles', 'permissions'));
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required|unique:roles']);
        Role::create(['name' => $request->name]);
        return back()->with('success', 'Role Created');
    }
}
