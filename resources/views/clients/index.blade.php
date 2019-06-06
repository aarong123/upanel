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
                Listado de clientes
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
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <th scope="row">{{ $client->id }}</th>
                            <td>{{ ($client->deleted_at) ? "Desactivado" : "Activado" }}</td>
                            <td>{{ $client->name }}</td>
                            <td>{{ $client->lastname }}</td>
                            <td>{{ $client->type_doc }}</td>
                            <td>{{ $client->num_doc }}</td>
                            <td>{{ $client->telephone }}</td>
                            <td>{{ $client->email }}</td>
                            <td>
                                <!-- Example single danger button -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        Seleccionar opción
                                    </button>
                                    <div class="dropdown-menu">
                                        <div style="text-align: center"><a class="dropdown-item"
                                           href="{{ url('/client/edit/' . $client->id) }}">Editar</a></div>
                                        <div class="dropdown-divider"></div>
                                        @if($client->deleted_at)
                                            <form method="post" action="{{ url('/client/active/' . $client->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <div style="text-align: center"><button type="submit" class="dropdown-item">Activar</div>
                                                </button>
                                            </form>
                                        @elseif(Auth::user()->id != $client->id)
                                            <form method="post" action="{{ url('/client/deactive/' . $client->id) }}">
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
                    <a href="{{ url('client/create') }}" class="btn btn-primary">Registrar un nuevo cliente</a>
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