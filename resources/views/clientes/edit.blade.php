@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>
                {{ __('Clientes')}}
            </h2>
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ __('Editar cliente')}} </h4>
            {{-- <p class="card-text">Text</p> --}}
            <form action="{{ route('clientes.update', $cliente ) }} " method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control text-uppercase" name="nombre"
                        value="{{ $cliente->nombre }}" required autocomplete="name" autofocus>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Apellidos</label>
                        <input type="text" class="form-control text-uppercase" name="apellidos"
                        value="{{ $cliente->apellidos }}" required autocomplete="name" autofocus>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="">Telefono</label>
                        <input type="tel" class="form-control" name="telefono" maxlength="12"
                        value="{{ $cliente->telefono }}" required autocomplete="name" autofocus>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="">Dirección</label>
                        <input  type="text" class="form-control text-uppercase" name="direccion"
                        value="{{ $cliente->direccion }}" required autocomplete="name" autofocus>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-9">
                        <label for="" class="">Fecha de nacimiento</label>
                        <input id="fecha" type="date" name="nacimiento" class="fecha form-control col-md-6 col-lg-4" value="{{ $cliente->nacimiento }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-8">
                        <label for="">Horario</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Entrada</span>
                            </div>
                            <input type="time" name="hora_entrada" class="form-control" value="{{ $cliente->hora_entrada }}">

                            <div class="input-group-prepend input-group-append">
                                <span class="input-group-text" id="basic-addon1">Salida</span>
                            </div>
                            <input type="time" name="hora_salida" class="form-control" value="{{ $cliente->hora_salida }}">
                        </div>

                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Pago</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input type="number" class="form-control" name="pago" min="0" value="{{ $cliente->pago }}">
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
