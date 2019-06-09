@extends('layouts.app')

@section('content')

    @if (session()->has('success'))

        <div class="alert alert-success" role="alert">
            <strong>
                {{ session()->get('success') }}
            </strong>
        </div>

    @endif
    @foreach ($errors->all() as $message)
    {{ $message }}
@endforeach
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
                        <th scope="col">Nombre(s)</th>
                        <th scope="col">Apellido(s)</th>
                        <th scope="col">Tipo de documento</th>
                        <th scope="col">Número de documento</th>
                        <th scope="col">Número telefónico</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Nombre Usuario</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ (!$user->deleted_at) ? "Activado" : "Desactivado" }}</td>
                            <td>{{ (!$user->deleted_at) ? $user->person->name : 'Desactivado'}}</td>
                            <td>{{ (!$user->deleted_at) ? $user->person->lastname : 'Desactivado'}}</td>
                            <td>{{ (!$user->deleted_at) ? $user->person->type_doc : 'Desactivado'}}</td>
                            <td>{{ (!$user->deleted_at) ? $user->person->num_doc : 'Desactivado'}}</td>
                            <td>{{ (!$user->deleted_at) ? $user->person->telephone : 'Desactivado'}}</td>
                            <td>{{ (!$user->deleted_at) ? $user->person->email : 'Desactivado'}}</td>
                            <td>{{ (!$user->deleted_at) ? $user->user : 'Desactivado' }}</td>
                            <td>{{ (!$user->deleted_at) ? $user->role->name : 'Desactivado' }}</td>
                            <td>
                                <!-- Example single danger button -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        Seleccionar opción
                                    </button>
                                    <div class="dropdown-menu">
                                        @if(!$user->deleted_at)
                                        <div style="text-align: center"><a class="dropdown-item"
                                           href="{{ url('/user/edit/' . $user->id) }}">Editar</a></div>
                                            <div class="dropdown-divider"></div>
                                        @endif
                                        @if($user->deleted_at)
                                            <form method="post" action="{{ url('/user/active/' . $user->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <div style="text-align: center"><button type="submit" class="dropdown-item">Activar</div>
                                                </button>
                                            </form>
                                        @elseif(Auth::user()->id != $user->id)
                                            <form method="post" action="{{ url('/user/deactive/' . $user->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <div style="text-align: center"><button type="submit" class="dropdown-item">Desactivar</div>
                                                </button>
                                            </form>
                                        @else
                                        <div style="text-align: center">No puedes desactivarte a ti mismo.</div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
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