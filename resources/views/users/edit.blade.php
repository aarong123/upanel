@extends('layouts.app')

@section('content')
<div class="wrapper">
    <form class ="f1" method="post" action="{{ url('user/update/' . $person->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group row">
          <div class="form-group col-md-6">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre"  placeholder="nombre" name="name" value="{{ $person->name }}">
          </div>
            <div class="form-group col-md-6">
                <label for="lastname">Apellido</label>
                <input type="text" class="form-control" id="lastname" placeholder="Apellido" name="lastname" value="{{ $person->lastname }}">
            </div>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" value="{{ $person->address }}">
        </div>
        <div class="form-group">
            <label for="telephone"># telefono</label>
            <input type="number" class="form-control" id="telephone" placeholder="telefono" name="telephone" value="{{ $person->telephone }}">
        </div>
        <div class="form-group col-md-4">
            <label for="type_doc">Tipo de documento</label>
            <select id="type_doc" class="form-control" name="type_doc">
                <option selected>Seleccione...</option>
                <option value="CC">Cedula de ciudadania</option>
            </select>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="num_doc"># de documento</label>
                <input type="number" class="form-control" id="num_doc" name="num_doc" value="{{ $person->num_doc }}">
            </div>

            <div class="form-group col-md-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $person->email }}">
            </div>

            <div class="form-group col-md-3">
                <label for="user">Usuario</label>
                <input type="text" class="form-control" id="user" name="user" value="{{ $person->user->user }}">
            </div>

            <div class="form-group col-md-3">
                <label for="password">Pass</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </div>
        <div class="form-row">
            <label for="role_id">Rol</label>
            <select id="role_id" class="form-control" name="role_id">
                <option selected>Seleccione...</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <button>
            <i class="spinner"></i>
            <span class="state" >Enviar</span>
        </button>
        <!--<button type="submit" class="btn btn-primary">Enviar</button>-->
    </div>
    </form>

@stop