<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProyectoController;


// Ruta para el login
Route::get('/', function () {
    return view('auth.login');
});

// Rutas de usuarios, protegidas por autenticación
Route::resource('/usuarios', UsuarioController::class)
    ->middleware('auth');

// Ruta de bienvenida para usuarios normales
Route::get('/welcomeuser', function () {
    return view('welcomeuser');
})->name('welcomeuser')->middleware('auth');

Route::post('/proyectos', [ProyectoController::class, 'store'])->name('proyectos.store');

// Rutas de dashboard, con redirección según tipo de usuario
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () { 
        if (Auth::user()->user_type === 1) {
            return redirect('/usuarios'); // Redirige a /usuarios si es admin
        } else {
            return redirect()->route('welcomeuser'); // Redirige a welcomeuser si es usuario normal
        }
    });
});


