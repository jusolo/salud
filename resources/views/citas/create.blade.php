@extends('layouts.app')

@section('content')
<h1>Crear cita</h1>
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

<form method="POST" action="{{ route('citas.store') }}">
    @csrf

    <div class="form-group">
        <label for="medico_id">Médico</label>
        <select name="medico_id" id="medico_id" class="form-control">
            @foreach ($medicos as $medico)
            <option value="{{ $medico->id }}">{{ $medico->nombre }}</option>
            @endforeach
        </select>
        @error('medico_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="paciente_id">Paciente</label>
        <select name="paciente_id" id="paciente_id" class="form-control">
            @foreach ($pacientes as $paciente)
            <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
            @endforeach
        </select>
        @error('paciente_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="consultorio_id">Consultorio</label>
        <select name="consultorio_id" id="consultorio_id" class="form-control">
            @foreach ($consultorios as $consultorio)
            <option value="{{ $consultorio->id }}">{{ $consultorio->nombre }}</option>
            @endforeach
        </select>
        @error('consultorio_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="fecha_hora">Fecha y hora</label>
        <input type="datetime-local" name="fecha_hora" id="fecha_hora" class="form-control">
        @error('fecha_hora')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mt-3">Crear cita</button>
</form>
@endsection
