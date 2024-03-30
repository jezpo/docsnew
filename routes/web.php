<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
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

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Vista para crear usuarios
    Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Acción para guardar un nuevo usuario
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Rutas para la gestión de roles
    Route::resource('roles', RoleController::class);
    
    // Rutas para la gestión de permisos
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
});

require __DIR__ . '/auth.php';
