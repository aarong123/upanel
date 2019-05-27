@extends('layouts.app')

@section('content')

    @if (session()->has('success'))

        <div class="alert alert-success" role="alert">
            <strong>
                {{ session()->get('success') }}
            </strong>
        </div>

    @endif


        <div class="wrapper">
            <form class= "formulario1" method="post" action="{{ url('item/register') }}">
                @csrf
                <p class="title">Creación de productos</p>
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
                        <input placeholder="Código de barras" type="text" name="code">
                        <i class="fa fa-barcode"></i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Nombre (*)</label>
                    <div class="col-md-9">
                        <input placeholder="Nombre del artículo" type="text" name="name">
                        <i class="fa fa-signature"></i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Precio de venta del producto (*)</label>
                    <div class="col-md-9">
                        <input placeholder="Precio del producto" name="price_sale" type="number">
                        <i class="fa fa-dollar-sign"></i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Fecha de vencimiento (*)</label>
                    <div class="col-md-9">
                        <input type="date" name="expiration_date">
                        <i class="fa fa-calendar-week"></i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Stock (*)</label>
                    <div class="col-md-9">
                        <input placeholder="Stock inicial del producto" type="number" name="stock">
                        <i class="fa fa-sort-numeric-up"></i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Umbral de stock (*)</label>
                    <div class="col-md-9">
                        <input placeholder="Umbral del stock" type="number" name="stock_threshold">
                        <i class="fa fa-sort-amount-up"></i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Umbral de ventas (*)</label>
                    <div class="col-md-9">
                        <input placeholder="Umbral de ventas" type="number" name="sales_threshold">
                        <i class="fa fa-sort-amount-up"></i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Umbral de expiración (*)</label>
                    <div class="col-md-9">
                        <input placeholder="# de días de anticipación para notificar fecha de vencimiento" type="number" name="expiration_threshold">
                        <i class="fa fa-clock"></i>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label">Descripción</label>
                    <div class="col-md-9">
                        <input placeholder="Descripción" type="text" name="description">
                        <i class="fa fa-file-alt"></i>
                    </div>
                </div>
                <div style="text-align:center; padding:40px 0px 0px 0px;">
                <button type="submit" class="btn btn-primary">
                    <i class="spinner"></i>
                    Crear
                </button>
                </div>
            </form>
        </div>
        <br>
        <div> 
            <a href="{{ url('/item') }}" class="btn btn-primary" style="text-align:center">Atr&aacute;s</a>
        </div>
        <br>
@stop