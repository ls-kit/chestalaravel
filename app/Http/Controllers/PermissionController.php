<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions', compact('permissions'));
    }

    public function store(Request $request){
        $request->validate(['name' => 'required|unique:permissions']);
        Permission::create(['name' => $request->name]);
        return back()->with('success', 'Permission Created');
    }

    public function assignPermission(Request $request, Role $role){
        $request->validate([
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,id',
        ]);
        // $permissions = Permission::findOrFail($request->permissions);
        // dd($permissions);
        // dd([$permissions->id]);
        $role->permissions()->attach($request->permissions);
        return back()->with('success', 'Permissions assigned successfully.');
    }
}
