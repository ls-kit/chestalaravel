<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index(){
        $users = User::all();
        $roles = Role::all();
        return view('admin.user', compact('users', 'roles'));
    }

    public function assignRole(Request $request,User $user){
        $role = Role::findOrFail($request->role);
        $user->roles()->sync([$role->id]);
        return redirect()->back()->with('success', 'Role assigned successfully');
    }
}
