@extends('layouts.app')

@section('content')

    <form method="post" action="{{ url('category/register') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" placeholder="Nombre" name="name">
            </div>
            <div class="form-group col-md-6">
                <label for="description">Descripcion</label>
                <input type="text" class="form-control" id="description" placeholder="Descripcion" name="description">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

@stop