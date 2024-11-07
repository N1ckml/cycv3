<?php

use Illuminate\Support\Facades\Route;

// Ruta para el login
Route::get('/', function () {
    return view('auth.login');
});

// Rutas de usuarios, protegidas por autenticación
Route::resource('/usuarios', 'App\Http\Controllers\UsuarioController')
    ->middleware('auth');  // Asegúrate de proteger estas rutas con 'auth'

// Rutas de dashboard, protegidas también
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () { 
        return redirect('/usuarios'); // Redirige a /usuarios
    });
});