<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::all();
        return view('admin.roles', compact('roles'));
    }

    public function store(Request $request) {
        $request->validate(['name' => 'required|unique:roles']);
        Role::create(['name' => $request->name]);
        return back()->with('success', 'Role Created');
    }
}
