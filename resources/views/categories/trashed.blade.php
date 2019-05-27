@extends('layouts.app')

@section('content')

    <table class="table table-hover table-dark mt-5">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Opción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>
                    <form method="post" action="{{ url('/category/trashed/active/' . $category->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Activar</button>
                </td>
            </tr>
        @endforeach
    </table>
    <div> 
            <a href="{{ url('/category') }}" class="btn btn-primary">Atr&aacute;s</a>
    </div>

@stop