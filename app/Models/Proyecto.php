<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'icono',
        'user_id'
    ];

    // Relación muchos a muchos con User
    //Permiten acceder a los usuarios en un proyecto y al creador de un proyecto, respectivamente.
    //Define la relación muchos a muchos con User mediante la tabla intermedia proyecto_user.
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'proyecto_user');
    }

    // Relación uno a muchos (inverso) con el creador del proyecto
    //Permiten acceder a los usuarios en un proyecto y al creador de un proyecto, respectivamente.
    public function creador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
