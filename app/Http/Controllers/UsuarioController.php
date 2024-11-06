<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//usar el modelo
use App\Models\Usuario;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $usuarios = Usuario::all();
        return view('usuario.index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $usuarios = new usuario();
        $usuarios->nombre = $request->get('nombre');
        $usuarios->apellido = $request->get('apellido');
        $usuarios->dni = $request->get('dni');
        $usuarios->celular = $request->get('celular');
        $usuarios->correo = $request->get('correo');
        $usuarios->contrasenia = $request->get('contrasenia');

        $usuarios->save();
        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $usuario = Usuario::find($id);
        return view('usuario.edit')->with('usuario', $usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $usuario = Usuario::find($id);

        $usuario->nombre = $request->get('nombre');
        $usuario->apellido = $request->get('apellido');
        $usuario->dni = $request->get('dni');
        $usuario->celular = $request->get('celular');
        $usuario->correo = $request->get('correo');
        $usuario->contrasenia = $request->get('contrasenia');

        $usuario->save();
        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $usuario = Usuario::find($id);
        $usuario->delete();
        return redirect('/usuarios');
    }
}
