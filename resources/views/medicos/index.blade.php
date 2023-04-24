@extends('layouts.app')
@section('content')
<h1>Medicos</h1>
<a href="{{ route('medicos.create') }}" class="btn btn-primary mb-3">Agregar medico</a>
<table class="table">
    <thead>
        <tr>
            <th>Documento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Especialidad</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($medicos as $medico)
        <tr>
            <td>{{ $medico->documento }}</td>
            <td>{{ $medico->nombre }}</td>
            <td>{{ $medico->apellido }}</td>
            <td>{{ $medico->especialidad }}</td>
            <td>{{ $medico->telefono }}</td>
            <td>{{ $medico->direccion }}</td>
            <td>
                <a href="{{ route('medicos.show', $medico->id) }}" class="btn btn-info">Detalles</a>
                <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este medico?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
