<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UPanel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
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
</head>
<body>
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
        <div class="title m-b-md">
            UPanel
        </div>
        @if (session()->has('unauthorized'))

            <div class="alert alert-success" role="alert">
                <strong>
                    {{ session()->get('unauthorized') }}
                </strong>
            </div>

        @endif
        <div class="links">
            <a href="https://laravel.com/docs">Dashboard</a>
            <a href="{{ url('category') }}">Categorías</a>
            <a href="{{ url('item') }}">Productos</a>
            <a href="{{ url('sale') }}">Ventas</a>
            <a href="{{ url('item') }}">Compras</a>
            <a href="{{ url('rol') }}">Roles</a>
            <a href="{{ url('user') }}">Gestión de usuarios</a>
        </div>
    </div>
</div>
</body>
</html>
