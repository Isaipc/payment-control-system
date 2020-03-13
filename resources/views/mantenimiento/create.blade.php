@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card w-75">
        <div class="card-header">
            <h2>
                {{ __('Mantenimiento')}}
            </h2>
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ __('Nuevo empleado')}} </h4>
            {{-- <p class="card-text">Text</p> --}}
            <form action="{{ route('mantenimiento.store') }} " method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Concepto</label>
                        <input type="text" class="form-control text-uppercase" name="nombre"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Tipo</label>
                        <input type="text" class="form-control text-uppercase" name="tipo"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="">Costo</label>
                        <input type="number" class="form-control" name="costo" maxlength="12"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Fecha de compra</label>
                        <input  type="date" class="form-control text-uppercase" name="fecha_compra"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                    </div>
                </div>

                <button type="submit" class="btn btn-md btn-primary">Guardar</button>
                <a href="{{ route('mantenimiento.index') }} " class="btn btn-md btn-secondary">Cancelar</a>
            </form>
        </div>
        {{-- <div class="card-footer text-muted"></div> --}}
    </div>
</div>

@endsection
