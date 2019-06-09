@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-success">
                <div class="card-body" style="align-text:center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div style="text-align:center; margin: 0 auto; color: black"> 
                    ¡Te encuentras logueado!
                    <br>
                    <br>
                        <a href="{{ url('/main') }}" class="btn btn-primary">Ir al men&uacute; principal</a>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
