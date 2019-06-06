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
                Listado de proveedores
            </div>
            <div class="card-body" style="width:1070px;">
                <table class="table table-hover table-dark mt-5 table-responsive" id="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre(s)</th>
                        <th scope="col">Tipo de documento</th>
                        <th scope="col">Número de documento</th>
                        <th scope="col">Dirección de contacto</th>
                        <th scope="col">Correo electrónico de contacto</th>
                        <th scope="col">Nro. telefónico de contacto </th>
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($providers as $provider)
                        <tr>
                            <th scope="row">{{ $provider->id }}</th>
                            <td>{{ ($provider->deleted_at) ? "Desactivado" : $provider->person->name  }}</td>
                            <td>{{ ($provider->deleted_at) ? "Desactivado" : $provider->person->type_doc  }}</td>
                            <td>{{ ($provider->deleted_at) ? "Desactivado" : $provider->person->num_doc  }}</td>
                            <td>{{ ($provider->deleted_at) ? "Desactivado" : $provider->person->address  }}</td>
                            <td>{{ $provider->contact }}</td>
                            <td>{{ $provider->telephone_contact }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        Seleccionar opción
                                    </button>
                                    <div class="dropdown-menu">
                                        <div style="text-align: center"><a class="dropdown-item" href="{{ url('/provider/edit/' . $provider->id) }}">Editar</a></div>
                                        <div class="dropdown-divider"></div>
                                        @if($provider->deleted_at)
                                            <form method="post" action="{{ url('/provider/active/' . $provider->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <div style="text-align: center"><button type="submit" class="dropdown-item">Activar</div>
                                                </button>
                                            </form>
                                        @else
                                            <form method="post" action="{{ url('/provider/deactive/' . $provider->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <div style="text-align: center"><button type="submit" class="dropdown-item">Desactivar</div>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
                <div style="text-align:center; margin: 0 auto;">
                    <a href="{{ url('provider/create') }}" class="btn btn-primary">Registrar un nuevo proveedor</a>
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
