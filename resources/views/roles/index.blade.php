@extends('layouts.app')

@section('content')

    <div class="container">
        <table class="table table-hover table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripción</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $rol)
                <tr>
                    <th scope="row">{{ $rol->id }}</th>
                    <td>{{ $rol->name }}</td>
                    <td>{{ $rol->description }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop