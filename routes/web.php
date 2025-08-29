<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\AdminSettingsController;
use App\Http\Middleware\IsAdmin;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Auth Routes
// Show login form
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

// Handle login submission
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

// Logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('IsAdmin')
    ->name('logout');


use App\Http\Controllers\Auth\RegisteredUserController;

// Registration
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');


// Normal User Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Settings (dark/light mode)
    Route::get('/settings', [SettingsController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');

// Admin Routes
Route::middleware([IsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    // Admin dashboard / settings
    Route::get('/settings', [AdminSettingsController::class, 'index'])->name('settings');

    // Manage users
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');

    // Export users
    Route::post('/users/export', [AdminUserController::class, 'export'])->name('users.export');
    Route::get('/admin/users/export-all', [AdminUserController::class, 'exportAll'])->name('admin.users.exportAll');

});

// Include default Laravel auth routes if needed
require __DIR__.'/auth.php';
