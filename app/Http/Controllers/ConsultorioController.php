<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;

use Illuminate\Http\Request;

class ConsultorioController extends Controller
{
    public function index()
    {
        $consultorios = Consultorio::all();
        return view('consultorios.index', compact('consultorios'));
    }

    public function create()
    {
        return view('consultorios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'departamento' => 'required|max:255',
            'municipio' => 'required|max:255',
            'direccion' => 'required|max:255',
        ]);

        $consultorio = new Consultorio;
        $consultorio->nombre = $request->nombre;
        $consultorio->departamento = $request->departamento;
        $consultorio->municipio = $request->municipio;
        $consultorio->direccion = $request->direccion;
        $consultorio->save();

        return redirect()->route('consultorios.show', $consultorio->id)->with('success', 'Consultorio creado exitosamente.');
    }

    public function show($id)
    {
        $consultorio = Consultorio::find($id);
        return view('consultorios.show', compact('consultorio'));
    }

    public function edit($id)
    {
        $consultorio = Consultorio::find($id);
        return view('consultorios.edit', compact('consultorio'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|max:255',
            'departamento' => 'required|max:255',
            'municipio' => 'required|max:255',
            'direccion' => 'required|max:255',
        ]);

        $consultorio = Consultorio::find($id);
        $consultorio->departamento = $request->departamento;
        $consultorio->municipio = $request->municipio;
        $consultorio->direccion = $request->direccion;
        $consultorio->save();

        return redirect()->route('consultorios.show', $consultorio->id)->with('success', 'Consultorio actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $consultorio = Consultorio::find($id);
        $consultorio->delete();

        return redirect()->route('consultorios.index')->with('success', 'Consultorio eliminado exitosamente.');
    }
}
