<?php

use App\Http\Controllers\AdministrationController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\ContractController;
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

Route::get('dashboard', [DashboardController::class,"index"])
->middleware(['auth', 'verified'])->name('dashboard');

// Role based routes
Route::group(['middleware' => 'auth'], function () {
    // Normal User Routes
    Route::group(['middleware' => 'verified'], function () {     
        // Master Data Routes
        Route::resource('drivers', DriverController::class)
            ->only(['index']);
        Route::resource('branches', LocationController::class)
            ->only(['index']);
        Route::resource('owners', OwnerController::class)
            ->only(['index']);
        Route::resource('vehicles', VehicleController::class)
            ->only(['index']);
        
        // Management Routes
        Route::resource('contracts', ContractController::class)
            ->only(['index']);
        Route::resource('routines', RoutineController::class)
            ->only(['index']);
        Route::resource('maintenances', MaintenanceController::class)
            ->only(['index']);
        Route::resource('administrations', AdministrationController::class)
            ->only(['index']);
    });

    // Admin Routes
    Route::group(['middleware' => 'admin'], function () {
        // Master Data Routes
        Route::resource('drivers', DriverController::class)
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
        Route::resource('branches', LocationController::class)
            ->only(['create', 'store', 'edit', 'update']);
        Route::resource('owners', OwnerController::class)
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
        Route::resource('vehicles', VehicleController::class)
            ->only(['create', 'store', 'edit', 'update', 'show']);
        
        //  Management Routes
        Route::resource('contracts', ContractController::class)
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
        Route::resource('routines', RoutineController::class)
            ->only(['create', 'store', 'edit', 'update', 'destroy']);
        Route::resource('maintenances', MaintenanceController::class)
            ->only(['create', 'store', 'edit', 'update', 'destroy', 'show']);
        Route::resource('administrations', AdministrationController::class)
            ->only(['create', 'store', 'edit', 'update', 'destroy', 'show']);
    });

    // Superadmin
    Route::group(['middleware' => 'superadmin'], function () {
        // Crucial Delete Relation Route
        Route::resource('branches', LocationController::class)
        ->only(['destroy']);
        Route::resource('vehicles', VehicleController::class)
        ->only(['destroy']);
        
        // Master Admin
        Route::resource('users', UserController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
