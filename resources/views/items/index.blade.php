@extends('layouts.app')

@section('content')

    <a href="{{ url('item/create') }}" class="btn btn-primary">Crear producto</a>

    <div class="container">
        <table class="table table-hover table-dark mt-5">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Código</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio de venta</th>
                <th scope="col">Stock</th>
                <th scope="col">Descripción</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha de expiración</th>
                <th scope="col">Umbral de ventas</th>
                <th scope="col">Umbral de stock</th>
                <th scope="col">Umbral de expiración</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->code }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price_sale }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->state }}</td>
                    <td>{{ $item->expiration_date }}</td>
                    <td>{{ $item->sales_threshold }}</td>
                    <td>{{ $item->stock_threshold }}</td>
                    <td>{{ $item->expiration_threshold }}</td>
                    <td>
                        <!-- Example single danger button -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url('/item/edit/' . $item->id) }}">Editar</a>
                                <div class="dropdown-divider"></div>
                                <form method="post" action="{{ url('/item/deactive/' . $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item">Desactivar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop