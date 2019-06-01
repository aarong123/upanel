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
        <form class="formulario1" method="post" action="{{ url("provider/update/$provider->id") }}">
            @csrf
            @method('PUT')
            <p class="title">Registro de proveedores</p>
            <div class="form-group row">
                <div class="form group col-md-12">
                    <label for="name">Nombre(s):</label>
                    <input type="text" placeholder="Ingrese su(s) nombre(s)" name="name"
                           value="{{ $provider->person->name }}">
                    <i class="fa fa-user"></i>
                </div>
            </div>

            <div class="form-group row">
                <div class="form-group col-md-12">
                    <label for="address">Dirección de residencia:</label>
                    <input type="text" placeholder="Ingrese la dirección de residencia" name="address"
                           value="{{ $provider->person->address }}">
                    <i class="fa fa-home"></i>
                </div>
            </div>

            <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="type_doc">Tipo de documento:</label>
                    <select id="type_doc" class="form-control" name="type_doc">
                        <option>Seleccione...</option>
                        <option {{ ($provider->person->type_doc == 'RUT') ? 'selected' : ''}} value="RUT">RUT</option>
                        <option {{ ($provider->person->type_doc == 'NIT') ? 'selected' : ''}} value="NIT">NIT</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="num_doc">Número de identidad:</label>
                    <input type="number" placeholder="Ingrese su nro. de documento" name="num_doc"
                           value="{{ $provider->person->num_doc }}">
                    <i class="fa fa-sort-numeric-up"></i>
                </div>
            </div>

            <div class="form-group row">
                <div class="form-group col-md-4">
                    <label for="address">Dirección de contacto:</label>
                    <input type="text" placeholder="Ingrese la dirección de residencia" name="address"
                           value="{{ $provider->person->address }}">
                    <i class="fa fa-home"></i>
                </div>

                <div class="form-group col-md-4">
                    <label for="contact">Email de contacto:</label>
                    <input type="email" placeholder="Ingrese el email de contacto" name="contact"
                           value="{{ $provider->contact }}">
                    <i class="fa fa-home"></i>
                </div>

                <div class="form-group col-md-4">
                    <label for="telephone_contact">Número de contacto:</label>
                    <input type="number" placeholder="Ingrese su nro. telefónico" name="telephone_contact"
                           value="{{ $provider->telephone_contact }}">
                    <i class="fa fa-phone"></i>
                </div>
            </div>

            <div style="text-align:center; padding:40px 0px 0px 0px;">
                <button type="submit" class="btn btn-primary">
                    <i class="spinner"></i>
                    Actualizar usuario
                </button>
            </div>
        </form>
    </div>
    <br>
    <div>
        <a href="{{ url('/provider') }}" class="btn btn-primary" style="text-align:center">Atr&aacute;s</a>
    </div>
    <br>

@stop