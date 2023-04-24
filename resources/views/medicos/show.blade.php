@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Información de medico</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="documento" class="col-md-4 col-form-label text-md-right">Documento:</label>
                        <div class="col-md-6">
                            <p>{{ $medico->documento }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre:</label>
                        <div class="col-md-6">
                            <p>{{ $medico->nombre }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellido" class="col-md-4 col-form-label text-md-right">Apellido:</label>
                        <div class="col-md-6">
                            <p>{{ $medico->apellido }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="apellido" class="col-md-4 col-form-label text-md-right">Especialidad:</label>
                        <div class="col-md-6">
                            <p>{{ $medico->especialidad }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telefono" class="col-md-4 col-form-label text-md-right">Teléfono:</label>
                        <div class="col-md-6">
                            <p>{{ $medico->telefono }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion:</label>
                        <div class="col-md-6">
                            <p>{{ $medico->direccion }}</p>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
