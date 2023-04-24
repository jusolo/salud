@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Información de receta</h5>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="paciente" class="col-md-4 col-form-label text-md-right">Paciente:</label>
                        <div class="col-md-6">
                            <p>{{ $cita->paciente->nombre }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medicamento" class="col-md-4 col-form-label text-md-right">Medicamento:</label>
                        <div class="col-md-6">
                            @foreach ($cita->medicamentos as $medicamento)
                            <p>{{ $medicamento->nombre }}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cantidad" class="col-md-4 col-form-label text-md-right">Cantidad:</label>
                        <div class="col-md-6">
                            @foreach ($cita->medicamentos as $medicamento)
                            <p>{{ $medicamento->pivot->cantidad }}</p>
                            @endforeach
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
