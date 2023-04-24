<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;

use App\Models\Paciente;
use App\Models\Cita;
use App\Models\Medico;
use App\Models\Diagnostico;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('documento')) {
            $documento = $request->input('documento');
            $paciente = Paciente::where('documento', $documento)->get();
            $citas = Cita::where('paciente_id', $paciente[0]->id)->get();
            $diagnosticos = Diagnostico::whereIn('cita_id', $citas->pluck('id'))->get();
            return view('diagnosticos.index', compact('diagnosticos', 'documento'));
        }
        return view('diagnosticos.index');
    }
    public function create($cita_id, $medico_id)
    {
        $cita = Cita::find($cita_id);
        $medico = Medico::find($medico_id);
        return view('diagnosticos.create', compact('cita', 'medico'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|max:255',
        ]);

        $diagnostico = new Diagnostico;
        $diagnostico->cita_id = $request->cita_id;
        $diagnostico->medico_id = $request->medico_id;
        $diagnostico->descripcion = $request->descripcion;
        $diagnostico->save();

        $cita = Cita::find($request->cita_id);
        $cita->diagnostico = "si";
        $cita->save();

        return redirect()->route('agendas.index')->with('success', 'Diagnostico creado exitosamente.');
    }

    public function show($id)
    {
        $diagnostico = Diagnostico::find($id);
        return view('diagnosticos.show', compact('diagnostico'));
    }

    public function generarPdf(Request $request, $id)
    {
        $diagnostico = Diagnostico::find($id);

        // Generar código HTML con la información del diagnóstico
        $html = '<h1>Diagnóstico</h1>';
        $html .= '<p><strong>Paciente:</strong> ' . $diagnostico->cita->paciente->nombre . $diagnostico->cita->paciente->apellido . '</p>';
        $html .= '<p><strong>Fecha:</strong> ' . $diagnostico->cita->fecha_hora . '</p>';
        $html .= '<p><strong>Diagnostico:</strong> ' . $diagnostico->descripcion . '</p>';
        $html .= '<p><strong>Receta:</strong> ' . $diagnostico->cita->medicamentos[0]->nombre . $diagnostico->cita->medicamentos[0]->pivot->cantidad . '</p>';

        // Generar PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Descargar PDF
        return $dompdf->stream('diagnostico.pdf');
    }
}
