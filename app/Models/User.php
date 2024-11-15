<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable;

    protected $fillable = [
        'name',
        'apellido',
        'email',
        'password',
        'dni',
        'celular',
        'user_type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relación muchos a muchos con Proyecto
    //acceder a los proyectos en los que un usuario está involucrado.
    public function proyectos()
    {
        return $this->belongsToMany(Proyecto::class, 'proyecto_user');
    }

    // Relación uno a muchos con proyectos creados por el usuario
    //permitiendo al usuario ver los proyectos que ha creado.
    public function proyectosCreados()
    {
        return $this->hasMany(Proyecto::class);
    }
}
