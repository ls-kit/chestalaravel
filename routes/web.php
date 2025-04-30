<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //role management route
    Route::get('/roles',[RoleController::class, 'index'])->name('roles.index');
    Route::post('/roles-create',[RoleController::class, 'store'])->name('role.store');
    Route::get('/admin-user',[AdminController::class,'index'])->name('admin.users');
    Route::post('/admin/assign-role/{user}',[AdminController::class,'assignRole'])->name('admin.users.assignRole');
});

require __DIR__.'/auth.php';


