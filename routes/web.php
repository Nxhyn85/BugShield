<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\ProgramsController;
use App\Http\Controllers\AiController;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Public Section
Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');

// User Section
Route::middleware('auth')->group(function () {
    // Programs
    Route::get('/programs', [ProgramsController::class, 'indexForUsers'])->name('programs');
    Route::get('/programs/{uid}/view', [ProgramsController::class, 'viewProgramForUsers'])->name('program.view');

    // User Profile
    Route::get('/dashboard', [UserHomeController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Reports
    Route::get('/report/{programUid}/create', [ReportController::class, 'index'])->name('submit.report');
    Route::post('/report/{programUid}/create', [ReportController::class, 'create'])->name('submit.report');
    Route::get('/report/show/{uid}', [ReportController::class, 'show'])->name('report.show');

});

// Admin Section
Route::middleware(['auth:admin'])->group(function () {
    
    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::put('/admin/profile', [AdminController::class, 'updatePassword'])->name('admin.password.update');
    Route::post('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

    // Reports
    Route::get('/admin/report/{uid}/show/', [AdminController::class, 'showReport'])->name('admin.report.show');
    Route::post('/admin/report/{uid}/update/', [AdminController::class, 'updateReport'])->name('admin.report.update');

    // Add Admin
    Route::get('/admin/admins', [AdminController::class, 'admins'])->name('admin.admins');
    Route::get('/admin/add', [AdminController::class, 'addAdmin'])->name('admin.add');
    Route::post('/admin/add', [AdminController::class, 'storeAdmin'])->name('admin.store');
    Route::get('/admin/{uid}/edit', [AdminController::class, 'editAdmin'])->name('admin.edit');
    Route::put('/admin/{uid}/update', [AdminController::class, 'updateAdmin'])->name('admin.update');
    Route::delete('/admin/{uid}/delete', [AdminController::class, 'deleteAdmin'])->name('admin.delete');

    // Programs
    Route::get('/admin/programs', [ProgramsController::class, 'index'])->name('admin.programs');
    Route::get('/admin/add/program', [ProgramsController::class, 'addProgram'])->name('admin.program.add');
    Route::get('/admin/program/{uid}', [ProgramsController::class, 'viewProgramForUsers'])->name('admin.program.view');
    Route::post('/admin/add/program', [ProgramsController::class, 'storeProgram'])->name('admin.program.store');
    Route::get('/admin/programs/{uid}/edit', [ProgramsController::class, 'editProgram'])->name('admin.program.edit');
    Route::put('/admin/programs/{uid}/update', [ProgramsController::class, 'updateProgram'])->name('admin.program.update');
    Route::delete('/admin/programs/{uid}/delete', [ProgramsController::class, 'deleteProgram'])->name('admin.program.delete');

    // Users
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/{uid}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{uid}/update', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{uid}/delete', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

    // AI Route
    Route::post('/ai', [AiController::class, 'generate'])->name('ai');

});

Route::get('/test', function () {
    $admin = new Admin();
        $admin->uid = Str::uuid()->toString();
        $admin->name = 'Admin';
        $admin->username = 'admin';
        $admin->email = 'admin@localhost';
        $admin->password = Hash::make('password');
        $admin->save();
        return "success";
});

require __DIR__.'/auth.php';
