@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/main') }}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Categorias
            </li>
        </ol>
    </nav>

    <a href="{{ url('category/create') }}" class="btn btn-primary mb-5">Crear categoria</a>

    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <table class="table table-hover table-dark mt-5" id="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
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
                                    <a class="dropdown-item" href="{{ url('/category/edit/' . $category->id) }}">Editar</a>
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