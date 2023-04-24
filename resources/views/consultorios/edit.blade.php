@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar consultorio</h1>
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

    <form method="POST" action="{{ route('consultorios.update', $consultorio->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $consultorio->nombre }}">
        </div>
        <div class="form-group">
            <label for="departamento">Departamento:</label>
            <input type="text" class="form-control" id="departamento" name="departamento" value="{{ $consultorio->departamento }}">
        </div>
        <div class="form-group">
            <label for="municipio">Municipio:</label>
            <input type="text" class="form-control" id="municipio" name="municipio" value="{{ $consultorio->municipio }}">
        </div>
        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <textarea class="form-control" id="direccion" name="direccion">{{ $consultorio->direccion }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar cambios</button>
    </form>
</div>
@endsection
