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
        <form class="formulario" method="post" action="{{ url('category/register') }}">
            @csrf
            <p class="title">Registro de categor&iacute;a</p>
            <input type="text" placeholder="Nombre" name="name"/>
            <i class="fa fa-signature"></i>

            <input type="text" placeholder="Descripci&oacute;n" name="description">
            <i class="fa fa-file-alt"></i>
            <button>
                <i class="spinner"></i>
                <span class="state">Registrar categoría</span>
            </button>
        </form>
    </div>

    <br>

    <div class="card">
        <div class="card-header">
            Listado de categor&iacute;as
        </div>
        <div class="card-body" style="margin: 0 auto;">
            <table class="table table-hover table-dark mt-5 table-responsive" id="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripci&oacute;n</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ ($category->deleted_at) ? "Desactivado" : "Activado" }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Seleccionar opción
                                </button>
                                <div class="dropdown-menu">
                                    <div style="text-align: center"><a class="dropdown-item"
                                       href="{{ url('/category/edit/' . $category->id) }}">Editar</a></div>
                                    <div class="dropdown-divider"></div>
                                    @if($category->deleted_at)
                                        <form method="post" action="{{ url('/category/active/' . $category->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div style="text-align: center"><button type="submit" class="dropdown-item">Activar</div>
                                            </button>
                                        </form>
                                    @else
                                        <form method="post" action="{{ url('/category/deactive/' . $category->id) }}">
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
        </div>
    </div>
    <br>
    <div>
        <a href="{{ url('/main') }}" class="btn btn-primary">Ir al men&uacute; principal</a>
    </div>
    <br>
@stop
