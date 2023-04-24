@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Información de diagnostico</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="paciente" class="col-md-4 col-form-label text-md-right">Paciente:</label>
                        <div class="col-md-6">
                            <p>{{ $diagnostico->cita->paciente->nombre }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medico" class="col-md-4 col-form-label text-md-right">Medico:</label>
                        <div class="col-md-6">
                            <p>{{ $diagnostico->medico->nombre }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion:</label>
                        <div class="col-md-6">
                            <p>{{ $diagnostico->descripcion }}</p>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <a href="{{ route('agendas.index') }}" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
