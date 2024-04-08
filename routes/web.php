<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaravelRolesController;
use App\Http\Controllers\LaravelPermissionsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Vista para crear usuarios
    Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Acción para guardar un nuevo usuario
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Rutas para la gestión de roles
    Route::get('/roles', [LaravelRolesController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [LaravelRolesController::class, 'create'])->name('roles.create');
    Route::post('/roles', [LaravelRolesController::class, 'store'])->name('roles.store');
    Route::get('/roles/edit/{id}', [LaravelRolesController::class, 'edit'])->name('roles.edit');
    Route::delete('/roles/{id}', [LaravelRolesController::class, 'destroy'])->name('roles.destroy');

    
    // Rutas para la gestión de permisos
    Route::get('/permissions', [LaravelPermissionsController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [LaravelPermissionsController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [LaravelPermissionsController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/edit/{id}', [LaravelPermissionsController::class, 'edit'])->name('permissions.edit');
    Route::delete('/permissions/{id}', [LaravelPermissionsController::class, 'destroy'])->name('permissions.destroy');
    
});

require __DIR__ . '/auth.php';
