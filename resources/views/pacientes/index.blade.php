@extends('layouts.app')
@section('content')
<h1>Pacientes</h1>
<a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">Agregar paciente</a>
<table class="table">
    <thead>
        <tr>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pacientes as $paciente)
        <tr>
            <td>{{ $paciente->documento }}</td>
            <td>{{ $paciente->nombre }}</td>
            <td>{{ $paciente->apellido }}</td>
            <td>{{ $paciente->telefono }}</td>
            <td>{{ $paciente->direccion }}</td>
            <td>
                <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info">Detalles</a>
                <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este paciente?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
