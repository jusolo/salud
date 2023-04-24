@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Listado de Citas</h1>
    <a href="{{ route('citas.create') }}" class="btn btn-primary mb-2">Crear Nueva Cita</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Médico</th>
                <th scope="col">Paciente</th>
                <th scope="col">Consultorio</th>
                <th scope="col">Fecha y Hora</th>
                <th scope="col">Estado</th>
                <th scope="col">Justificación</th>
                <th scope="col">Diagnostico</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($citas as $cita)
            <tr>
                <th scope="row">{{ $cita->id }}</th>
                <td>{{ $cita->medico->nombre }}</td>
                <td>{{ $cita->paciente->nombre }}</td>
                <td>{{ $cita->consultorio->nombre }}</td>
                <td>{{ $cita->fecha_hora }}</td>
                <td>
                    @if($cita->cancelada == false)
                    <form action="{{ route('citas.cancelar', $cita->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="d-flex justify-content-between">
                            <div class="form-group mr-2">
                                <input type="text" name="justificacion" class="form-control" placeholder="Justificación" required>
                            </div>
                            <button type="submit" class="btn btn-danger">Cancelar</button>
                        </div>
                    </form>
                    @else
                    Cancelada
                    @endif
                </td>
                <td>{{ $cita->justificacion }}</td>
                <td>{{ $cita->diagnostico }}</td>
                <td>
                    <a href="{{ route('citas.show', $cita->id) }}" class="btn btn-info">Detalles</a>
                    <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-warning">Editar</a>
                </td>


            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
