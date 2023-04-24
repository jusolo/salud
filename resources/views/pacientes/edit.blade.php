@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar paciente</h1>
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

    <form method="POST" action="{{ route('pacientes.update', $paciente->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="documento">Documento:</label>
            <input type="text" class="form-control" id="documento" name="documento" value="{{ $paciente->documento }}" readonly>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $paciente->nombre }}" readonly>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $paciente->apellido }}" readonly>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $paciente->telefono }}">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <textarea class="form-control" id="direccion" name="direccion">{{ $paciente->direccion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
    </form>
</div>
@endsection
