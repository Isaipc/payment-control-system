@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>
                {{ __('Editar material')}}
            </h2>
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ __('')}} </h4>
            {{-- <p class="card-text">Text</p> --}}
            <form action="{{ route('mantenimiento.store', $mantenimiento) }} " method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Concepto</label>
                        <input type="text" class="form-control text-uppercase" name="concepto"
                        value="{{ $mantenimiento->concepto }}" required autofocus>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Tipo</label>
                        <input type="text" class="form-control text-uppercase" name="tipo"
                        value="{{ $mantenimiento->tipo }}" required >
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="">Costo</label>
                        <input type="number" class="form-control" name="costo" maxlength="12"
                        value="{{ $mantenimiento->costo }}" required  >
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Fecha de compra</label>
                        <input  type="date" class="form-control text-uppercase" name="fecha_compra"
                        value="{{ date('Y-m-d' , strtotime($mantenimiento->fecha_compra)) }}" required >
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
