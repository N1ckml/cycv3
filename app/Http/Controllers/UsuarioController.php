<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Verificar el tipo de usuario para redirigir según corresponda
        $user = Auth::user();

        if ($user->user_type === 1) {
            // Si es administrador, mostrar el listado de usuarios
            $users = User::all(); // Cambiamos la variable a $users para que coincida con la vista
            return view('usuario.index')->with('users', $users);
        } elseif ($user->user_type === 2) {
            // Si es usuario normal, redirigir a welcomeuser
            return redirect()->route('welcomeuser');
        } else {
            // Redirección por defecto si el tipo de usuario no está definido
            return redirect('/')->with('error', 'Tipo de usuario no permitido.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->get('nombre');
        $user->apellido = $request->get('apellido');
        $user->dni = $request->get('dni');
        $user->celular = $request->get('celular');
        $user->email = $request->get('correo');
        $user->password = bcrypt($request->get('contrasenia'));
        $user->user_type = $request->get('user_type', 2); // Por defecto, usuario normal

        $user->save();
        return redirect('/usuarios');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('usuario.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user->name = $request->get('name');
        $user->apellido = $request->get('apellido');
        $user->dni = $request->get('dni');
        $user->celular = $request->get('celular');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));

        $user->save();
        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/usuarios');
    }
}
