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
                Listado de ventas
            </div>
            <div class="card-body">
                <table class="table table-hover table-dark mt-5 table-responsive" id="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">IVA(19%)</th>
                        <th scope="col">Total con descuento(%)</th>
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sales as $sale)

                        <tr>
                            <th scope="row">{{ $sale->id }}</th>
                            <td>{{ $sale->state }}</td>
                            <td>{{ ($sale->person) ? $sale->person->name : "Desactivado" }}</td>
                            <td>{{ $sale->user->user }}</td>
                            <td>{{ $sale->tax }}</td>
                            <td>{{ $sale->total }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        Seleccionar opción
                                    </button>
                                    <div class="dropdown-menu">
                                        <form method="post" action="{{ url('/sale/deactive/' . $sale->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div style="text-align: center">
                                                <button type="submit" class="dropdown-item">Anular venta</button>
                                            </div>
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
                    <a href="{{ url('sale/create') }}" class="btn btn-primary">Registrar una nueva venta</a>
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
