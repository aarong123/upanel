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
                Listado de todas las ventas
            </div>
            <div class="card-body" style="width:1070px;">
                <table class="table table-hover table-dark mt-5 table-responsive" id="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">id_client</th>
                        <th scope="col">id_user</th>
                        <th scope="col">type_voucher</th>
                        <th scope="col">series_voucher</th>
                        <th scope="col">num_voucher</th>
                        <th scope="col">tax</th>
                        <th scope="col">total</th>
                        <th scope="col">state</th>
                        


                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sales as $sale)
                    
                        <tr>
                            <th scope="row">{{ $sale->id }}</th>
                            <td>{{ $sale->id_client}}</td>
                            <td>{{ $sale->id_user }}</td>
                            <td>{{ $sale->type_voucher }}</td>
                            <td>{{ $sale->series_voucher }}</td>
                            <td>{{ $sale->num_voucher }}</td>
                            <td>{{ $sale->tax }}</td>
                            <td>{{ $sale->total }}</td>
                            <td>{{ $sale->state }}</td>
                            
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
                                            <button type="submit" class="dropdown-sale">Desactivar
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
            <a href="{{ url('sale/create') }}" class="btn btn-primary">Crear venta</a>
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
