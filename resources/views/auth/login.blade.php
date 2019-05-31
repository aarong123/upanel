@extends('layouts.app')

@section('content')

<div class="wrapper">
    <form class="formulario" method="POST" action="{{ route('login') }}">
      @csrf
      <p class="title">Inicio de sesión</p>

      <input type="text" placeholder="Nombre de usuario" name="user" value="{{ old('user') }}" required autocomplete="user" autofocus/>
      <i class="fa fa-user"></i>
      @error('user')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
   
      <input type="password" placeholder="Contraseña" name="password" required autocomplete="current-password"/>
      <i class="fa fa-key"></i>
      @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
      <button>
        <i class="spinner"></i>
        <span class="state">Iniciar sesión</span>
      </button>
    </form>
    </p>
  </div>
@endsection