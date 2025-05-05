<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\OfficerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
;
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    // Profile Routes
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Support Routes
    Route::get('/support', [SupportController::class, 'index'])->name('support.index');
    Route::post('/support', [SupportController::class, 'store'])->name('support.store');
    Route::post('/support/{message}/reply', [SupportController::class, 'reply'])->name('support.reply');
    // Role Management
    Route::get('/roles', [RoleController::class, 'index'])->middleware('role:admin')->name('roles.index');
    Route::post('/roles', [RoleController::class, 'store'])->middleware('role:admin')->name('roles.store');
    // Permission Management
    Route::get('/permissions',[PermissionController::class,'index'])->middleware('role:admin')->name('permissions.index');
    Route::post('/permissions',[PermissionController::class,'store'])->middleware('role:admin')->name('permissions.store');
    Route::post('/assign-permission/{role}',[PermissionController::class,'assignPermission'])->middleware('role:admin')->name('permissions.assign');
    // Admin User Management
    Route::get('/admin/users', [AdminController::class, 'index'])->middleware('role:admin,editor,moderator')->name('admin.users');
    Route::post('/admin/{user}', [AdminController::class, 'assignRole'])->middleware('role:admin')->name('admin.users.assignRole');

    // CRUD division and officer
    Route::resource('divisions',DivisionController::class)->middleware('role:admin');
    Route::resource('officers',OfficerController::class)->middleware('role:admin');
});
require __DIR__.'/auth.php';
