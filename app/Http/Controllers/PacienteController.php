<?php

namespace App\Http\Controllers;

use App\Models\Paciente;

use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();

        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'documento' => 'required|max:255',
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'telefono' => 'nullable|max:255',
            'direccion' => 'nullable|max:255',
        ]);

        $paciente = new Paciente;
        $paciente->documento = $request->documento;
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->telefono = $request->telefono;
        $paciente->direccion = $request->direccion;
        $paciente->save();

        return redirect()->route('pacientes.show', $paciente->id)->with('success', 'Paciente creado exitosamente.');
    }

    public function show($id)
    {
        $paciente = Paciente::find($id);
        return view('pacientes.show', compact('paciente'));
    }

    public function edit($id)
    {
        $paciente = Paciente::find($id);

        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'telefono' => 'nullable|max:255',
            'direccion' => 'nullable|max:255',
        ]);

        $paciente = Paciente::find($id);
        $paciente->telefono = $request->telefono;
        $paciente->direccion = $request->direccion;
        $paciente->save();

        return redirect()->route('pacientes.show', $paciente->id)->with('success', 'El paciente ha sido actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();

        return redirect()->route('pacientes.index')->with('success', 'El paciente ha sido eliminado exitosamente.');
    }
}
