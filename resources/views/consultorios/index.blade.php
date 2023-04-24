@extends('layouts.app')
@section('content')
<h1>Consultorios</h1>
<a href="{{ route('consultorios.create') }}" class="btn btn-primary mb-3">Agregar consultorio</a>
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Departamento</th>
            <th>Municipio</th>
            <th>Direccion</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($consultorios as $consultorio)
        <tr>
            <td>{{ $consultorio->nombre }}</td>
            <td>{{ $consultorio->departamento }}</td>
            <td>{{ $consultorio->municipio }}</td>
            <td>{{ $consultorio->direccion }}</td>
            <td>
                <a href="{{ route('consultorios.show', $consultorio->id) }}" class="btn btn-info">Detalles</a>
                <a href="{{ route('consultorios.edit', $consultorio->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('consultorios.destroy', $consultorio->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este consultorio?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
