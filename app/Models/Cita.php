<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $fillable = [
        'medico_id',
        'paciente_id',
        'consultorio_id',
        'fecha_hora',
        'cancelada',
        'justificacion',
        'diagnostico',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }

    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class);
    }

    public function medicamentos()
    {
        return $this->belongsToMany(Medicamento::class)
                    ->withPivot('cantidad');
    }
}
