<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    use HasFactory;
    protected $fillable = [
        'cita_id',
        'medico_id',
        'descripcion',
    ];

    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }

    public function diagnosticos()
    {
        return $this->hasMany(Diagnostico::class);
    }

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
}
