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
                Listado de compras
            </div>
            <div class="card-body" style="margin: 0 auto;">
                <table class="table table-hover table-dark mt-5 table-responsive" id="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($entries as $entry)
                        <tr>
                            <th scope="row">{{ $entry->id }}</th>
                            <td>{{ $entry->state }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        Seleccionar opción
                                    </button>
                                    <div class="dropdown-menu">
                                        <form method="post" action="{{ url('/entry/deactive/' . $entry->id) }}">
                                            @csrf
                                            @method('DELETE')
                                        <div style="text-align: center"></div><button type="submit" class="dropdown-item">Anular compra</div>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <br>
                <div style="text-align:center; margin: 0 auto;">
                    <a href="{{ url('entry/create') }}" class="btn btn-primary">Registrar una nueva compra</a>
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
