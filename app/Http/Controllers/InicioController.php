<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Medico;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();

        return view('inicio.index', compact('pacientes', 'medicos'));
        // return view('inicio.index');
    }
}
