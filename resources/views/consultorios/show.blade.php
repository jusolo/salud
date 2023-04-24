@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Información de consultorio</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre:</label>
                        <div class="col-md-6">
                            <p>{{ $consultorio->nombre }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="departamento" class="col-md-4 col-form-label text-md-right">Departamento:</label>
                        <div class="col-md-6">
                            <p>{{ $consultorio->departamento }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="municipio" class="col-md-4 col-form-label text-md-right">Municipio:</label>
                        <div class="col-md-6">
                            <p>{{ $consultorio->municipio }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion:</label>
                        <div class="col-md-6">
                            <p>{{ $consultorio->direccion }}</p>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('consultorios.edit', $consultorio->id) }}" class="btn btn-primary">Editar</a>
                            <a href="{{ route('consultorios.index') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
