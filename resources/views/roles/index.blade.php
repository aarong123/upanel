@extends('layouts.app')

@section('content')

    <div class="container" style="width:1100px;padding:0px 30px 0px 0px">
        <div class="card">
            <div class="card-header">
                Roles del sistema
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
    <br>
    <div style="margin: 0 auto; width:1100px;"> 
        <a href="{{ url('/main') }}" class="btn btn-primary">Ir al men&uacute; principal</a>
    </div>
    <br>

@stop