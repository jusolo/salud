@extends('layouts.app')
@section('content')
<h1>Diagnosticos</h1>
@if(!isset($documento))
<div class="row mb-3 mt-3">
    <div class="col-md-6">
        <form action="{{ route('diagnosticos.index') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Documento" name="documento" value="{{ old('documento') }}">
                <button class="btn btn-outline-secondary" type="submit">
                    Buscar
                </button>
            </div>
        </form>
    </div>
</div>
@else
<div class="row mt-4">
    <div class="col-md-12">
        @if(isset($diagnosticos))
        <h2>Documento: {{ $documento }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Medico</th>
                    <th>Diagnostico</th>
                    <th>Receta</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($diagnosticos as $diagnostico)
                <tr>
                    <td>{{ $diagnostico->cita->medico->nombre }}</td>
                    <td>{{ $diagnostico->descripcion }}</td>
                    @foreach ($diagnostico->cita->medicamentos as $medicamento)
                    <td>
                        {{ $medicamento->nombre}}
                        {{ $medicamento->pivot->cantidad}}
                    </td>
                    @endforeach
                    <td>
                        <a href="{{ route('diagnosticos.pdf', $diagnostico->id) }}" class="btn btn-sm btn-primary">Generar PDF</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endif

@endsection
