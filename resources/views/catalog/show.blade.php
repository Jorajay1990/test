@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>{{ $product->name }}</h1>
        <p>{{ $product->description }}</p>
        <p><strong>Precio:</strong> ${{ $product->price }}</p>

        @auth
            <form action="{{ route('order.create', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Comprar</button>
            </form>
        @else
            <p><a href="{{ route('login') }}">Inicia sesión</a> o <a href="{{ route('register') }}">crea una cuenta</a> para comprar.</p>
        @endauth

        <!-- Enlace para volver a la página de inicio -->
        <div class="mt-3">
            <a href="{{ url('/') }}" class="btn btn-primary">Volver a la página de inicio</a>
        </div>

    </div>
@endsection
