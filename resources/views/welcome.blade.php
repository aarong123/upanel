@extends('layouts.app')

@section('styles')

    <style>

        html, body {
            color: #ffffff;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            font-family: "Open Sans", sans-serif;
            background: url("https://www.iberopuebla.mx/sites/default/files/styles/1920x930_s_c/public/slidp/img-bg/00_img_d._inteligencia_empresarial_copy.jpg?itok=OyZVz4RC") 50% fixed;
            background-size: cover;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 1px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
            color: #f54545;
        }

        .links > a {
            color: #000000;
            padding: 0 25px;
            font-size: 15px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>

@stop
@section('content')

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}" id="home">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">UPanel</div>
            @if (session()->has('unauthorized'))

                <div class="alert alert-warning" role="alert">
                    <strong>
                        <i class="fas fa-exclamation-triangle"></i> {{ session()->get('unauthorized') }} <i class="fas fa-exclamation-triangle"></i>
                    </strong>
                </div>

            @endif
            <div class="card border-warning">
                    <div class="card-header border-warning bg-warning" style="height:48px">
                     <p style="font-size: 18px;">Menú principal</p>   
                    </div>
                    <div class="card-body border-warning bg-info"  style="font-size:16px;">
                        @include('partialMenu')
                    </div>
            </div>
 
        </div>
    </div>

@stop