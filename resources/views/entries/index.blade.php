@extends('layouts.app')

@section('content')

    @if (session()->has('success'))

        <div class="alert alert-success" role="alert">
            <strong>
                {{ session()->get('success') }}
            </strong>
        </div>

    @endif

    <div class="container" style="width:1100px;padding:0px 30px 0px 0px">

        <div class="card">
            <div class="card-header">
                Listado de todos los de ventas
            </div>
            <div class="card-body" style="width:1070px;">
                <table class="table table-hover table-dark mt-5 table-responsive" id="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Código</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio de venta</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha de expiración</th>
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($entries as $entry)
                        <tr>
                            <th scope="row">{{ $entry->id }}</th>
                            <th scope="row">{{ $entry->provider_id }}</th>
                            <th scope="row">{{ $entry->user_id }}</th>
                            <th scope="row">{{ $entry->type_voucher }}</th>
                            <th scope="row">{{ $entry->series_voucher }}</th>
                            <th scope="row">{{ $entry->num_voucher }}</th>
                            <th scope="row">{{ $entry->tax }}</th>
                            <th scope="row">{{ $entry->total }}</th>

                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        Seleccionar opción
                                    </button>
                                    <div class="dropdown-menu">
                                        <form method="post" action="{{ url('/entry/deactive/' . $entry->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-entry">Desactivar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
                <div style="text-align:center; margin: 0 auto;">
                    <a href="{{ url('entry/create') }}" class="btn btn-primary">Registrar un nueva compra</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div style="margin: 0 auto; width:1100px;">
        <a href="{{ url('/main') }}" class="btn btn-primary">Ir al men&uacute; principal</a>
    </div>
    <br>

@stop
