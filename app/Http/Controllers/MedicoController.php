<?php

namespace App\Http\Controllers;

use App\Models\Medico;

use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        return view('medicos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'documento' => 'required|max:255',
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'especialidad' => 'required|max:255',
            'telefono' => 'nullable|max:255',
            'direccion' => 'nullable|max:255',
        ]);

        $medico = new Medico;
        $medico->documento = $request->documento;
        $medico->nombre = $request->nombre;
        $medico->apellido = $request->apellido;
        $medico->especialidad = $request->especialidad;
        $medico->telefono = $request->telefono;
        $medico->direccion = $request->direccion;
        $medico->save();

        return redirect()->route('medicos.show', $medico->id)->with('success', 'Médico creado exitosamente.');
    }

    public function show($id)
    {
        $medico = Medico::find($id);
        return view('medicos.show', compact('medico'));
    }

    public function edit($id)
    {
        $medico = Medico::find($id);
        return view('medicos.edit', compact('medico'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'telefono' => 'nullable|max:255',
            'direccion' => 'nullable|max:255',
        ]);

        $medico = Medico::find($id);
        $medico->telefono = $request->telefono;
        $medico->direccion = $request->direccion;
        $medico->save();

        return redirect()->route('medicos.show', $medico->id)->with('success', 'Médico actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $medico = Medico::find($id);
        $medico->delete();

        return redirect()->route('medicos.index')->with('success', 'Médico eliminado exitosamente.');
    }
}
