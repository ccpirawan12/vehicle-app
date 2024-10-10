<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(['auth', 'verified']);

// Route::get('/dashboard', function () {
//     return view('dashboard', ['name'=>'Dashboard']);
// })->middleware(['auth', 'verified'])->name('dashboard');

// Normal User Routes
Route::get('dashboard', [DashboardController::class,"index"])
->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('drivers', DriverController::class)
->only(['index'])
->middleware(['auth', 'verified']);

Route::resource('branches', LocationController::class)
->only(['index'])
->middleware(['auth', 'verified']);

Route::resource('owners', OwnerController::class)
->only(['index'])
->middleware(['auth', 'verified']);

Route::resource('vehicles', VehicleController::class)
->only(['index'])
->middleware(['auth', 'verified']);

// Admin Routes
Route::resource('drivers', DriverController::class)
->only(['create', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'superadmin']);

Route::resource('branches', LocationController::class)
->only(['create', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'superadmin']);

Route::resource('owners', OwnerController::class)
->only(['create', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'superadmin']);

Route::resource('vehicles', VehicleController::class)
->only(['create', 'store', 'edit', 'update', 'destroy', 'show'])
->middleware(['auth', 'superadmin']);

// Master Admin
Route::resource('users', UserController::class)
->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])
->middleware(['auth', 'superadmin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
