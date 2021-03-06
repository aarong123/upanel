@extends('layouts.app')

@section('content')

    @if (session()->has('success'))

        <div class="alert alert-success" role="alert">
            <strong>
                {{ session()->get('success') }}
            </strong>
        </div>

    @endif
    
    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $message)
                <li>
                    <strong>
                        {{ $message }}
                    </strong>
                </li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="wrapper">
        <form class="formulario1" method="post" action="{{ url('entry/register') }}">
            @csrf
            <p class="title">Registro de compra</p>
            <div class="form-group row">
                <label class="col-md-3 form-control-label">Producto (*)</label>
                <div class="col-md-6">
                    <select class="form-control" name="item_id">
                        <option disabled value="0">Seleccione un producto</option>
                        @foreach($items as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 form-control-label">Proveedor (*)</label>
                <div class="col-md-6">
                    <select class="form-control" name="provider_id">
                        <option disabled value="0">Seleccione un proveedor</option>
                        @foreach($providers as $provider)
                            <option value="{{ $provider->id }}">
                                {{ $provider->person->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 form-control-label">Cantidad (*)</label>
                <div class="col-md-6">
                    <input type="number" placeholder="Ingrese la cantidad" name="quantity" min="1" pattern="^[0-9]+">
                    <i class="fa fa-sort-numeric-up"></i>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 form-control-label">Precio (*)</label>
                <div class="col-md-6">
                    <input type="number" placeholder="Ingrese el precio" name="price" min="1" pattern="^[0-9]+">
                    <i class="fa fa-dollar-sign"></i>
                </div>
            </div>
            <div style="text-align:center; padding:40px 0px 0px 0px;">
                <button type="submit" class="btn btn-primary">
                    <i class="spinner"></i>
                    Registrar compra
                </button>
            </div>
        </form>
    </div>
    <br>
    <div>
        <a href="{{ url('/entry') }}" class="btn btn-primary" style="text-align:center">Atr&aacute;s</a>
    </div>
    <br>
@stop