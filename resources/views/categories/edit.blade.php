@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/main') }}">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('/category') }}"> Categor&iacute;as
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Edici&oacute;n
            </li>
        </ol>
    </nav>
    @if (session()->has('success'))

        <div class="alert alert-success" role="alert">
            <strong>
                {{ session()->get('success') }}
            </strong>
        </div>

    @endif

    <div class="card">
        <div class="card-header">
            Edici&oacute;n de categor&iacute;as

        </div>
        <div class="card-body">
            <form method="post" action="{{ url('category/update/' . $category->id) }}">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" placeholder="Nombre" name="name"
                               value="{{ $category->name }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="description">Descripcion</label>
                        <input type="text" class="form-control" id="description" placeholder="Descripcion"
                               name="description" value="{{ $category->description }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>

@stop