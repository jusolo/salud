<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'departamento',
        'municipio',
        'direccion'
    ];

    public function medicos()
    {
        return $this->belongsToMany(Medico::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
