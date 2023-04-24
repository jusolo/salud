<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $fillable = [
        'documento',
        'nombre',
        'apellido',
        'especialidad',
        'telefono',
        'direccion',
    ];

    public function consultorios()
    {
        return $this->belongsToMany(Consultorio::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
