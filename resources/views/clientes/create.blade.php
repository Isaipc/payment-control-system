@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card w-75">
        <div class="card-header">
            <h2>
                {{ __('Clientes')}}
            </h2>
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ __('Nuevo cliente')}} </h4>
            {{-- <p class="card-text">Text</p> --}}
            <form action="{{ route('clientes.store') }} " method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control text-uppercase" name="nombre"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Apellidos</label>
                        <input type="text" class="form-control text-uppercase" name="apellidos"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="">Telefono</label>
                        <input type="tel" class="form-control" name="telefono" maxlength="12"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                    <div class="form-group col-md-9">
                        <label for="">Dirección</label>
                        <input  type="text" class="form-control text-uppercase" name="direccion"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-9">
                        <label for="" class="">Fecha de nacimiento</label>
                        <input id="fecha" type="date" name="nacimiento" class="fecha form-control col-md-6 col-lg-4">
                    </div>
                </div>

                <div class="row">
                    {{-- <div class="form-group col-md-6">
                        <label for="">RFC</label>
                        <input type="text" class="form-control text-uppercase @error('rfc') is-invalid @enderror" name="rfc" required maxlength="13">

                        @error('rfc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    <div class="form-group col-md-4">
                          <label for="">Horario</label>
                          <select class="form-control text-uppercase" name="horario" required>
                            <option value="">Seleccione un horario</option>
                                <option value="matutino">Matutino</option>
                                <option value="vespertino">Vespertino</option>
                                <option value="nocturno">Nocturno</option>
                          </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="">Pago</label>
                        <input type="number" class="form-control" name="honorario">
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
