@extends('layouts.app')

@section('content')

    <a href="{{ url('user/create') }}" class="btn btn-primary mb-5">Crear usuario</a>
    <a href="{{ url('user/trashed') }}" class="btn btn-primary mb-5">Activar usuarios</a>


    <div class="card">
        <div class="card-header">
            Lisatdo de usuarios
        </div>
        <div class="card-body">
            <table class="table table-hover table-dark mt-5" id="table">
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
                        <td>{{ $person->name }}</td>
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
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('/user/edit/' . $person->id) }}">Editar</a>
                                    <div class="dropdown-divider"></div>
                                    <form method="post" action="{{ url('user/deactive/' . $person->id) }}">
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
            </table>
        </div>
    </div>


@stop