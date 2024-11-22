<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'proyecto_id',
        'orden',
    ];

    // Relación inversa con Proyecto
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
}