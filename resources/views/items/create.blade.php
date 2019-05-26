@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/main') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('/item') }}">Productos</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Creaci&oacute;n
            </li>
        </ol>
    </nav>

    @if (session()->has('success'))

        <div class="alert alert-success" role="alert">
            <strong>
                {{ session()->get('success') }}
            </strong>
        </div>

    @endif

    <div class="card">
        <div class="card-header">
            Creaci&oacute;n de productos
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('item/register') }}">
                @csrf

                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Categoría (*)</label>
                    <div class="col-md-9">
                        <select class="form-control" name="category_id">
                            <option disabled value="0">Seleccione una categoría</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Código (*)</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="Código de barras" type="text" name="code">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Nombre (*)</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="Nombre de artículo" type="text" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Precio Venta (*)</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="Ingrese el precio del producto" name="price_sale"
                               type="number">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Fecha de vencimiento (*)</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" name="expiration_date">
                    </div>

                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Stock (*)</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="Ingrese el stock inicial del producto" type="number"
                               name="stock">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Umbral de stock (*)</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="Ingrese el umbral del stock" type="number"
                               name="stock_threshold">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Umbral de ventas (*)</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="Ingrese el umbral de ventas" type="number"
                               name="sales_threshold">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Umbral de vencimiento (*)</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="Ingrese el umbral de vencimiento" type="number"
                               name="expiration_threshold">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Descripción</label>
                    <div class="col-md-9">
                        <input class="form-control" placeholder="Ingrese descripción" type="text" name="description">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>

@stop