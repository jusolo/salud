@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar cita</h1>
    <hr>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('citas.update', $cita->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="paciente_id">Paciente:</label>
            <select class="form-control" id="paciente_id" name="paciente_id">
                @foreach ($pacientes as $paciente)
                <option value="{{ $paciente->id }}" {{ $paciente->id == $cita->paciente_id ? 'selected' : '' }}>
                    {{ $paciente->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="medico_id">Médico:</label>
            <select class="form-control" id="medico_id" name="medico_id">
                @foreach ($medicos as $medico)
                <option value="{{ $medico->id }}" {{ $medico->id == $cita->medico_id ? 'selected' : '' }}>
                    {{ $medico->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="consultorio_id">Consultorio:</label>
            <select class="form-control" id="consultorio_id" name="consultorio_id">
                @foreach ($consultorios as $consultorio)
                <option value="{{ $consultorio->id }}" {{ $consultorio->id == $cita->consultorio_id ? 'selected' : '' }}>
                    {{ $consultorio->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="fecha_hora">Fecha y hora:</label>
            <input type="datetime-local" class="form-control" id="fecha_hora" name="fecha_hora" value="{{ $cita->fecha_hora }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
    </form>
</div>
@endsection
