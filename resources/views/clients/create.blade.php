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
        <form class="formulario1" method="post" action="{{ url('client/register') }}">
            @csrf
            <p class="title">Registro de cliente</p>
            <div class="form-group row">
                <div class="form group col-md-6">
                    <label for="name">Nombre(s):</label>
                    <input type="text" placeholder="Ingrese su(s) nombre(s)" name="name">
                    <i class="fa fa-user"></i>
                </div>

                <div class="form-group col-md-6">
                    <label for="lastname">Apellido(s):</label>
                    <input type="text" placeholder="Ingrese su(s) apellido(s)" name="lastname">
                    <i class="fa fa-user"></i>
                </div>
            </div>

            <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="address">Dirección de residencia:</label>
                    <input type="text" placeholder="Ingrese la dirección de residencia" name="address">
                    <i class="fa fa-home"></i>
                </div>
                <div class="form-group col-md-6">
                    <label for="telephone">Número telefónico:</label>
                    <input type="number" placeholder="Ingrese su nro. telefónico" name="telephone" min="1" pattern="^[0-9]+">
                    <i class="fa fa-phone"></i>
                </div>
            </div>

            <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="type_doc">Tipo de documento:</label>
                    <select id="type_doc" class="form-control" name="type_doc">
                        <option value="0" selected>Seleccione...</option>
                        <option value="CC">Cédula de ciudadanía</option>
                        <option value="CE">Cédula de extranjería</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="num_doc">Número de documento de identidad:</label>
                    <input type="number" placeholder="Ingrese su nro. de documento" name="num_doc" min="1" pattern="^[0-9]+">
                    <i class="fa fa-sort-numeric-up"></i>
                </div>
            </div>

            <div class="form-group row">
                <div class="form-group col-md-6">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" placeholder="Ingrese su correo electrónico" name="email">
                    <i class="fa fa-at"></i>
                </div>
            </div>

            <div style="text-align:center; padding:40px 0px 0px 0px;">
                <button type="submit" class="btn btn-primary">
                    <i class="spinner"></i>
                    Registrar cliente
                </button>
            </div>
        </form>
    </div>
    <br>
    <div>
        <a href="{{ url('/client') }}" class="btn btn-primary" style="text-align:center">Atr&aacute;s</a>
    </div>
    <br>

@stop