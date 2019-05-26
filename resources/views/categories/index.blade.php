@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/main') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('/category') }}">Categor&iacute;as</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Crear
            </li>
        </ol>
    </nav>

    <a href="{{ url('category/create') }}" class="btn btn-primary mb-5">Crear categor&iacute;as</a>

    @if (session()->has('success'))

        <div class="alert alert-success" role="alert">
            <strong>
                {{ session()->get('success') }}
            </strong>
        </div>

    @endif

    <div class="card mb-5">
        <div class="card-header">
            Creaci&oacute;n de categor&iacute;as
        </div>
        <div class="card-body">
            <form method="post" action="{{ url('category/register') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" placeholder="Nombre" name="name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="description">Descripci&oacute;n</label>
                        <input type="text" class="form-control" id="description" placeholder="Descripci&oacute;n"
                               name="description">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/main') }}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Categor&iacute;as
            </li>
        </ol>
    </nav>

    <div class="card">
        <div class="card-header">
            Listado de categor&iacute;as
        </div>
        <div class="card-body">
            <table class="table table-hover table-dark mt-5" id="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripci&oacute;n</th>
                    <th scope="col">Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                       href="{{ url('/category/edit/' . $category->id) }}">Editar</a>
                                    <div class="dropdown-divider"></div>
                                    <form method="post" action="{{ url('/category/deactive/' . $category->id) }}">
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