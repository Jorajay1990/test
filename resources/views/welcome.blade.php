@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Bienvenido a la Aplicación</h1>



        @auth
            <p>Ya estás autenticado. Puedes <a href="{{ route('products.create') }}">crear productos</a> o ver el <a href="{{ route('catalog') }}">catálogo</a>.</p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                @method('POST')
            </form>

        @else
            <p>Para crear nuevos productos o para comprar productos, debes iniciar sesión.</p>
            <p><a href="{{ route('login') }}">Inicia sesión</a> para acceder a todas las funciones.</p>
        @endauth


        <div class="list-group">
            <a href="{{ route('users.createUsers') }}" class="list-group-item list-group-item-action">Crear Usuario Automaticamente</a>
            <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action">Ver Usuarios</a>
            <a href="{{ route('catalog') }}" class="list-group-item list-group-item-action">Ver Catálogo</a>
            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action">Ver Productos</a>
        </div>
    </div>
@endsection
