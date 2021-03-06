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
            <form class="formulario1" method="post" action="{{ url('client/update/' . $client->id) }}">
                @csrf
                @method('PUT')
                <p class="title">Edici&oacute;n del cliente</p>
                <div class="form-group row">
                    <div class="form group col-md-6">
                        <label for="name">Nombre(s):</label>
                        <input type="text" placeholder="Ingrese su(s) nombre(s)" name="name" value="{{ $client->name }}">
                        <i class="fa fa-user-tie"></i>
                    </div>
               
                    <div class="form-group col-md-6">
                        <label for="lastname">Apellido(s):</label>
                        <input type="text" placeholder="Ingrese su(s) apellido(s)" name="lastname" value="{{$client->lastname }}" >
                        <i class="fa fa-user-tie"></i>
                    </div>
                </div>
        
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label for="address">Dirección de residencia:</label>
                        <input type="text" placeholder="Ingrese la dirección de residencia" name="address" value="{{ $client->address }}">
                        <i class="fa fa-home"></i>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telephone">Número telefónico:</label>
                        <input type="number" placeholder="Ingrese su nro. telefónico" name="telephone" value="{{ $client->telephone }}" min="1" pattern="^[0-9]+">
                        <i class="fa fa-phone"></i>
                    </div>
                </div>
        
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label for="type_doc">Tipo de documento:</label>
                        <select id="type_doc" class="form-control" name="type_doc">
                            <option disabled>Seleccione...</option>
                            <option {{ ($client->type_doc == 'CC') ? 'selected' : ''}} value="CC">Cédula de ciudadanía</option>
                            <option {{ ($client->type_doc == 'CE') ? 'selected' : ''}} value="CE">Cédula de extranjería</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                            <label for="num_doc">Número de documento de identidad:</label>
                            <input type="number" placeholder="Ingrese su nro. de documento" name="num_doc" value="{{ $client->num_doc }}" min="1" pattern="^[0-9]+">
                            <i class="fa fa-sort-numeric-up"></i>
                    </div>
                </div>
        
                <div class="form-group row">
                    <div class="form-group col-md-12">
                        <label for="email">Correo electrónico:</label>
                        <input type="email" placeholder="Ingrese su correo electrónico" name="email" value="{{ $client->email }}">
                        <i class="fa fa-at"></i>
                    </div>
                </div>

                <div style="text-align:center; padding:40px 0px 0px 0px;">
                    <button type="submit" class="btn btn-primary">
                        <i class="spinner"></i>
                        Editar cliente
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
