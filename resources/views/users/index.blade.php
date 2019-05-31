@extends('layouts.app')

@section('content')

    @if (session()->has('success'))

        <div class="alert alert-success" role="alert">
            <strong>
                {{ session()->get('success') }}
            </strong>
        </div>

    @endif

    <div class="container" style="width:1100px;padding:0px 30px 0px 0px">
        <div class="card">
            <div class="card-header">
                Lisatdo de usuarios
            </div>
            <div class="card-body" style="width:1070px;">
                <table class="table table-hover table-dark mt-5 table-responsive" id="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Tipo de documento</th>
                        <th scope="col">Número de documento</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Nombre Usuario</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($persons as $person)
                        <tr>
                            <th scope="row">{{ $person->id }}</th>
                            <td>{{ ($person->deleted_at) ? "Desactivado" : "Activado" }}</td>
                            <td>{{ $person->name }}</td>
                            <td>{{ $person->lastname }}</td>
                            <td>{{ $person->type_doc }}</td>
                            <td>{{ $person->num_doc }}</td>
                            <td>{{ $person->telephone }}</td>
                            <td>{{ $person->email }}</td>
                            <td>{{ ($person->deleted_at) ? 'Desactivado': $person->user->user }}</td>
                            <td>{{ ($person->deleted_at) ? 'Desactivado': $person->user->role->name }}</td>
                            <td>
                                <!-- Example single danger button -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        Seleccionar opción
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                           href="{{ url('/user/edit/' . $person->id) }}">Editar</a>
                                        <div class="dropdown-divider"></div>
                                        @if($person->deleted_at)
                                            <form method="post" action="{{ url('/user/active/' . $person->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">Activar
                                                </button>
                                            </form>
                                        @elseif(Auth::user()->id != $person->id)
                                            <form method="post" action="{{ url('/user/deactive/' . $person->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">Desactivar
                                                </button>
                                            </form>
                                        @else
                                            no puedes desactivarte a ti mismo.
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div style="text-align:center; margin: 0 auto;">
                    <a href="{{ url('user/create') }}" class="btn btn-primary">Registrar un nuevo usuario</a>
                </div>
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