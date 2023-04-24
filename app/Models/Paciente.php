<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = [
        'documento',
        'nombre',
        'apellido',
        'telefono',
        'direccion',
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
