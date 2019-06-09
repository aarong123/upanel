@extends('layouts.app')

@section('content')

    @if (session()->has('success'))

        <div class="alert alert-success" role="alert">
            <strong>
                {{ session()->get('success') }}
            </strong>
        </div>

    @endif
    @foreach ($errors->all() as $message)
    {{ $message }}
@endforeach
    <div class="container" style="width:1100px;padding:0px 30px 0px 0px">

        <div class="card">
            <div class="card-header">
                Listado de productos
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
                            <td>{{ ($item->deleted_at) ? "Desactivado" : "Activado" }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price_sale }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->expiration_date }}</td>
                            <td>{{ $item->sales_threshold }}</td>
                            <td>{{ $item->stock_threshold }}</td>
                            <td>{{ $item->expiration_threshold }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        Seleccionar opción
                                    </button>
                                    <div class="dropdown-menu">
                                        <div style="text-align: center"><a class="dropdown-item" href="{{ url('/item/edit/' . $item->id) }}">Editar</a></div>
                                        <div class="dropdown-divider"></div>
                                        @if($item->deleted_at)
                                            <form method="post" action="{{ url('/item/active/' . $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <div style="text-align: center"><button type="submit" class="dropdown-item">Activar</div>
                                                </button>
                                            </form>
                                        @else
                                            <form method="post" action="{{ url('/item/deactive/' . $item->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <div style="text-align: center"><button type="submit" class="dropdown-item">Desactivar</div>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
            <div style="text-align:center; margin: 0 auto;"> 
            <a href="{{ url('item/create') }}" class="btn btn-primary">Registrar un nuevo producto</a>
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
