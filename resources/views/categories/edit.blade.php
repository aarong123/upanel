@extends('layouts.app')

@section('content')

    @if (session()->has('success'))

        <div class="alert alert-success" role="alert">
            <strong>
                {{ session()->get('success') }}
            </strong>
        </div>
        
    @endif

    @if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $message)
                <li>
                    <strong>
                        {{ $message }}
                    </strong>
                </li>
            @endforeach
        </ul>
    </div>
    @endif
    
        <div class="wrapper">
            <form class= "formulario" method="post" action="{{ url('category/update/' . $category->id) }}">
                @csrf
                @method('PUT')    
                <p class="title">Edici&oacute;n de la categor&iacute;a</p>

                        <input type="text" placeholder="Nombre" name="name" value="{{ $category->name }}"/>
                        <i class="fa fa-signature"></i>
    
                        <input type="text" placeholder="Descripci&oacute;n" name="description" value="{{ $category->description }}">
                        <i class="fa fa-file-alt"></i>

                <button>
                    <i class="spinner"></i>
                    <span class="state">Editar categoría</span>
                </button>
            </form>
        </div>
        <br>
    <div> 
        <a href="{{ url('/category') }}" class="btn btn-primary">Atr&aacute;s</a>
    </div>
    <br>
@stop
