@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>
                {{ __('Clientes')}}
                {{-- <span class="badge badge-success">{{ $count_clientes }}</span> --}}
                <span class="float-right">
                    {{-- <a href="{{ action('clienteController@generarPDF') }}" class="btn btn-md btn-primary">Generar reporte</a> --}}
                    <a href="{{ route('clientes.create') }}" class="btn btn-md btn-success">Nuevo cliente</a>
                </span>
            </h2>
        </div>
        <div class="card-body">
             <h4 class="card-title">Lista de clientes</h4>
            {{-- <p class="card-text">Text</p> --}}
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Horario</th>
                        <th>Pago</th>
                        <th>Telefono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $key=> $item)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td scope="row">
                                <form action=""></form>
                            <span id="{{ $item->id }}" data-toggle="modal" data-target="#cliente-data"
                                class="btn-link text-dark show-cliente">
                                    {{ $item->nombre }}
                            </span>
                            </td>
                            <td>{{ $item->apellidos}} </td>
                            {{-- <td>{{ date_diff($item->nacimiento, date_create())->format('%y') DateTime()->diff(new DateTime('NOW')) }} </td> --}}
                            <td>{{ $item->nacimiento ?: 'No registrado' }} </td>
                            <td>{{ $item->hora_entrada . ' - ' . $item->hora_salida }} </td>
                            {{-- <td>{{ $item->rfc}} </td> --}}
                            <td>{{ $item->pago ? '$' . $item->pago : 'No registrado' }}</td>
                            <td>{{ $item->telefono ?: 'No registrado'}}</td>
                            {{-- <td>{{ $item->created_at}} </td> --}}
                            {{-- <td>{{ $item->updated_at}} </td> --}}
                            <td>
                                <a href="{{ route('clientes.edit', $item->id) }} " class="btn btn-sm btn-primary bi bi-pencil">Editar</a>
                                <a href="javascript: document.getElementById('delete-{{ $item->id }}').submit()" class="btn btn-sm btn-danger">Eliminar</a>
                                <form id="delete-{{ $item->id }}" action="{{ route('clientes.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="card-footer text-muted">
            {{-- En esta sección puede agregar nuevos clientes. --}}
        </div>
    </div>

    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#cliente-data"> --}}
      {{-- Launch --}}
    {{-- </button> --}}

    <!-- Modal -->
    <div class="modal fade" id="cliente-data" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                            <h5 class="modal-title">Datos del cliente</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <h5 class="mr-2">Nombre:</h5>
                            <h5 id="cliente_nombre"></h5>
                        </div>
                        {{-- <div class="row mb-2">
                            <h5 class="mr-2">RFC:</h5>
                            <h5 id="cliente_rfc"></h5>
                        </div> --}}
                        <div class="row mb-2">
                            <h5 class="mr-2">Telefono:</h5>
                            <h5 id="cliente_telefono"></h5>
                        </div>
                        <div class="row mb-2">
                            <h5 class="mr-2">Dirección:</h5>
                            <h5 id="cliente_direccion"></h5>
                        </div>
                        <div class="row mb-2">
                            <h5 class="mr-2">Creación:</h5>
                            <h5 id="cliente_creacion"></h5>
                        </div>
                        <div class="row mb-2">
                            <h5 class="mr-2">Ultima actualización:</h5>
                            <h5 id="cliente_actualizacion"></h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                    {{-- <button type="button" class="btn btn-primary">Save</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
