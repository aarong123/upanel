@extends('layouts.app')

@section('content')

    <a href="{{ url('user/create') }}" class="btn btn-primary">Crear usuario</a>

    <table class="table table-hover table-dark mt-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Tipo de documento</th>
            <th scope="col">Número de documento</th>
            <th scope="col">Telefono</th>
            <th scope="col">Correo</th>
            <th scope="col">Usuario</th>
            <th scope="col">Rol</th>
            <th scope="col">Opciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($persons as $person)
            <tr>
                <th scope="row">{{ $person->id }}</th>
                <td>{{ $person->firstname }}</td>
                <td>{{ $person->lastname }}</td>
                <td>{{ $person->type_doc }}</td>
                <td>{{ $person->num_doc }}</td>
                <td>{{ $person->telephone }}</td>
                <td>{{ $person->email }}</td>
                <td>{{ $person->user->user }}</td>
                <td>{{ $person->user->role->name }}</td>
                <td>
                    <!-- Example single danger button -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('/user/edit/' . $person->id) }}">Editar</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

@stop