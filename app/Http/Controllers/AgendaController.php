<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Cita;
use App\Models\Consultorio;
use App\Models\Diagnostico;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('documento')) {
            $documento = $request->input('documento');
            $medico = Medico::where('documento', $documento)->get();

            $consultorios = Consultorio::all();
            $consultorio_id = $request->input('consultorio_id');

            if (!empty($consultorio_id)) {
                $citas = Cita::where('medico_id', $medico[0]->id)
                    ->where('consultorio_id', $request->consultorio_id)->orderBy('fecha_hora', 'asc')->paginate(10);
            } else {
                $citas = Cita::where('medico_id', $medico[0]->id)->orderBy('fecha_hora', 'asc')->paginate(10);
            }

            return view('agendas.index', compact('citas', 'documento', 'consultorios', 'medico'));
        }
        return view('agendas.index');
    }
}
