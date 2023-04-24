<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Medicamento;

use Illuminate\Http\Request;

class CitaMedicamentoController extends Controller
{
    public function create(Cita $cita)
    {
        $medicamentos = Medicamento::all();
        return view('cita-medicamento.create', compact('cita', 'medicamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cita_id' => 'required|exists:citas,id',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'cantidad' => 'required',
        ]);

        $cita = Cita::find($request->cita_id);

        $cita->medicamentos()->attach($request->medicamento_id, [
            'cantidad' => $request->cantidad,
        ]);
        return view('agendas.index')->with('success', 'Receta agregada correctamente a la cita.');
    }

    public function show($id)
    {
        $cita = Cita::find($id);
        return view('cita-medicamento.show', compact('cita'));
    }
}
