@extends('layouts.app')

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/main') }}">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Roles
            </li>
        </ol>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-header">
                Featured
            </div>
            <div class="card-body">
                <table class="table table-hover table-dark" id="table">
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
        </div>
    </div>

@stop