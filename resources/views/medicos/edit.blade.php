@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar medico</h1>
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

    <form method="POST" action="{{ route('medicos.update', $medico->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="documento">Documento:</label>
            <input type="text" class="form-control" id="documento" name="documento" value="{{ $medico->documento }}" readonly>
        </div>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $medico->nombre }}" readonly>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $medico->apellido }}" readonly>
        </div>
        <div class="form-group">
            <label for="especialidad">Especialidad:</label>
            <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{ $medico->especialidad }}" readonly>
        </div>
        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $medico->telefono }}">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <textarea class="form-control" id="direccion" name="direccion">{{ $medico->direccion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
    </form>
</div>
@endsection
