@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Información de cita</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="fecha_hora" class="col-md-4 col-form-label text-md-right">Fecha y hora:</label>
                        <div class="col-md-6">
                            <p>{{ $cita->fecha_hora }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medico" class="col-md-4 col-form-label text-md-right">Medico:</label>
                        <div class="col-md-6">
                            <p>{{ $cita->medico->nombre }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="paciente" class="col-md-4 col-form-label text-md-right">Paciente:</label>
                        <div class="col-md-6">
                            <p>{{ $cita->paciente->nombre }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion:</label>
                        <div class="col-md-6">
                            <p>{{ $cita->consultorio->nombre }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="estado" class="col-md-4 col-form-label text-md-right">Estado:</label>
                        <div class="col-md-6">
                            @if($cita->cancelada == false)
                            <p>Activa</p>
                            @else
                            <p>Cancelada</p>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('citas.index') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


