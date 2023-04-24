<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Consultorio;

use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::all();
        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        $consultorios = Consultorio::all();
        return view('citas.create', compact('pacientes', 'medicos', 'consultorios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'consultorio_id' => 'required|exists:consultorios,id',
            'fecha_hora' => 'required',
        ]);

        if (Cita::where('fecha_hora', $request->fecha_hora)->exists()) {
            return redirect()->back()->withErrors(['message' => 'Ya existe una cita en ese horario.']);
        }

        $cita = new Cita;
        $cita->medico_id = $request->medico_id;
        $cita->paciente_id = $request->paciente_id;
        $cita->consultorio_id = $request->consultorio_id;
        $cita->fecha_hora = $request->fecha_hora;
        $cita->save();

        return redirect()->route('citas.show', $cita->id)->with('success', 'Cita creada exitosamente.');
    }

    public function show($id)
    {
        $cita = Cita::find($id);
        return view('citas.show', compact('cita'));
    }

    public function edit($id)
    {
        $medicos = Medico::all();
        $consultorios = Consultorio::all();
        $pacientes = Paciente::all();

        $cita = Cita::find($id);
        return view('citas.edit', compact('cita', 'medicos', 'consultorios', 'pacientes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'consultorio_id' => 'required|exists:consultorios,id',
            'fecha_hora' => 'required',
        ]);

        $cita = Cita::find($id);

        if (Cita::where('fecha_hora', $request->fecha_hora)
            ->where('id', '!=', $cita->id)
            ->exists()
        ) {
            return redirect()->back()->withErrors(['message' => 'Ya existe una cita en ese horario.']);
        }

        $cita->medico_id = $request->medico_id;
        $cita->paciente_id = $request->paciente_id;
        $cita->consultorio_id = $request->consultorio_id;
        $cita->fecha_hora = $request->fecha_hora;
        $cita->save();

        return redirect()->route('citas.show', $cita->id)->with('success', 'Cita actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();

        return redirect()->route('citas.index')->with('success', 'Cita eliminada exitosamente.');
    }

    public function cancelar($id, Request $request)
    {
        $request->validate([
            'justificacion' => 'required|string',
        ]);

        $cita = Cita::find($id);
        $cita->cancelada = 1;
        $cita->justificacion = $request->justificacion;
        $cita->save();

        return redirect()->route('citas.index')
            ->with('success', 'La cita se ha cancelado correctamente.');
    }

}
