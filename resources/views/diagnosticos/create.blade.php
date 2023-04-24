@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Nuevo Diagnostico') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('diagnosticos.store') }}">
                        @csrf
                        <input type="hidden" name="cita_id" value="{{$cita->id}}">
                        <input type="hidden" name="medico_id" value="{{$medico->id}}">
                        <div class="form-group row pb-4">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                            <div class="col-md-6">
                                <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control @error('descripcion') is-invalid @enderror" required autocomplete="descripcion">{{ old('descripcion') }}</textarea>

                                @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
