<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        // dd(auth()->user());
        // if(!auth()->user()->hasRole('admin')) {
        //     return redirect()->to('dashboard')->with('error', 'You do not have permission to see users.');
        // }
        $users = User::all();
        $roles = Role::all();

        return view('admin.users', compact('users', 'roles'));
    }

    public function assignRole(Request $request, User $user) {
        // dd($user);
        // if(!auth()->user()->hasRole('admin')) {
        //     return redirect()->back()->with('error', 'You do not have permission to assign roles.');
        // }
        $role = Role::findOrFail($request->role);
        $user->roles()->sync([$role->id]);
        return back()->with('success', 'Role assigned successfully.');
    }
}
