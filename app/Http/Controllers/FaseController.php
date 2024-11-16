<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Fase;

class FaseController extends Controller
{
    // Método para mostrar las fases de un proyecto
    public function index($proyectoId)
    {
        $proyecto = Proyecto::with('fases')->findOrFail($proyectoId);
        return view('fases.index', compact('proyecto'));
    }

    // Método para almacenar una nueva fase en un proyecto
    public function store(Request $request, $proyectoId)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'orden' => 'nullable|integer',
        ]);

        $proyecto = Proyecto::findOrFail($proyectoId);
        $proyecto->fases()->create($request->only('nombre', 'descripcion', 'orden'));

        return redirect()->route('fases.index', $proyectoId)
            ->with('success', 'Fase creada con éxito.');
    }
}
