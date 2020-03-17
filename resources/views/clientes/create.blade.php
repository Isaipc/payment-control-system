@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>
                {{ __('Nuevo cliente')}}
            </h2>
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ __('Datos personales')}} </h4>
            {{-- <p class="card-text">Text</p> --}}
            <form action="{{ route('clientes.store') }} " method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control text-uppercase" name="nombre"
                        required  autofocus>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Apellidos</label>
                        <input type="text" class="form-control text-uppercase" name="apellidos"
                        required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="">Telefono</label>
                        <input type="tel" class="form-control" name="telefono" maxlength="12">
                    </div>
                    <div class="form-group col-md-9">
                        <label for="">Dirección</label>
                        <input  type="text" class="form-control text-uppercase" name="direccion">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-9">
                        <label for="" class="">Fecha de nacimiento</label>
                        <input id="fecha" type="date" name="nacimiento" class="fecha form-control col-md-6 col-lg-4">
                    </div>
                </div>
                {{-- <div class="form-group col-md-6">
                    <label for="">RFC</label>
                    <input type="text" class="form-control text-uppercase @error('rfc') is-invalid @enderror" name="rfc" required maxlength="13">

                    @error('rfc')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div> --}}

                {{-- <h4 class="card-title mt-3">{{ __('Membresía')}} </h4> --}}

                <div class="row">
                    <div class="form-group col-md-8">
                        <label for="">Horario</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Entrada</span>
                            </div>
                            <input type="time" name="hora_entrada" class="form-control" value="00:00">

                            <div class="input-group-prepend input-group-append">
                                <span class="input-group-text" id="basic-addon1">Salida</span>
                            </div>
                            <input type="time" name="hora_salida" class="form-control" value="00:00">
                        </div>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Pago</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input type="number" class="form-control" name="pago" min="0" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-md btn-primary">Guardar</button>
                <a href="{{ route('clientes.index') }} " class="btn btn-md btn-secondary">Cancelar</a>
            </form>
        </div>
        {{-- <div class="card-footer text-muted"></div> --}}
    </div>
</div>

@endsection
