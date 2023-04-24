@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Agregar receta') }}</div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="paciente" class="col-md-4 col-form-label text-md-right">Paciente:</label>
                        <div class="col-md-6">
                            <p>{{ $cita->paciente->nombre }} {{ $cita->paciente->apellido }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="medico" class="col-md-4 col-form-label text-md-right">Medico:</label>
                        <div class="col-md-6">
                            <p>{{ $cita->medico->nombre }} {{ $cita->medico->apellido }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fecha_hora" class="col-md-4 col-form-label text-md-right">Fecha y hora:</label>
                        <div class="col-md-6">
                            <p>{{ $cita->fecha_hora }}</p>
                        </div>
                    </div>
                    <form action="{{ route('cita-medicamento.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="cita_id" value="{{ $cita->id }}">

                        <div class="form-group">
                            <label for="medicamento_id">Medicamento</label>
                            <select name="medicamento_id" id="medicamento_id" class="form-control">
                                @foreach($medicamentos as $medicamento)
                                <option value="{{ $medicamento->id }}">{{ $medicamento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="cantidad">Dosis</label>
                            <textarea name="cantidad" id="cantidad" cols="30" rows="10" class="form-control" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Agregar Receta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
