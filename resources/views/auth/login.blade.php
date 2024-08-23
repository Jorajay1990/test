<!-- resources/views/auth/login.blade.php -->

@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Iniciar Sesión</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>

        <div class="mt-3">
            <a href="{{ url('/') }}">Volver a la página de inicio</a>
        </div>
    </div>
@endsection
