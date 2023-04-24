@extends('layouts.app')
@section('content')
<h1>Agendas</h1>
@if(!isset($documento))
<div class="row mb-3 mt-3">
    <div class="col-md-6">
        <form action="{{ route('agendas.index') }}" method="GET">
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
<div class="row mb-4">
    <div class="col-md-6 text-right">
        <form action="{{ route('agendas.index') }}" method="GET">
            <input type="hidden" value="{{$documento}}" name="documento">
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <select class="form-control mb-2" name="consultorio_id">
                        <option value="">Todos los consultorios</option>
                        @foreach ($consultorios as $consultorio)
                        <option value="{{ $consultorio->id }}">{{ $consultorio->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Filtrar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Fecha y hora</th>
            <th scope="col">Paciente</th>
            <th scope="col">Consultorio</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($citas as $cita)
        <tr>
            <td>{{ $cita->fecha_hora }}</td>
            <td>{{ $cita->paciente->nombre }}</td>
            <td>{{ $cita->consultorio->nombre }}</td>
            <td>
                <a href="{{ route('citas.show', $cita->id) }}" class="btn btn-sm btn-info">Ver cita</a>
                @if ($cita->diagnostico)
                <a href="{{ route('diagnosticos.show', $cita->id) }}" class="btn btn-sm btn-warning">Ver diagnostico</a>
                @else
                <a href="{{ route('diagnosticos.create', [$cita->id, $medico[0]->id]) }}" class="btn btn-sm btn-warning">Diagnosticar</a>
                @endif
                @if ($cita->medicamentos)
                <a href="{{ route('cita-medicamento.show', $cita->id) }}" class="btn btn-sm btn-warning">Ver receta</a>
                @else
                <a href="{{ route('cita-medicamento.create', $cita->id) }}" class="btn btn-sm btn-warning">Recetar</a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif




@endsection
