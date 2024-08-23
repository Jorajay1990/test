<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    @yield('head')

    <style>
        .navbar-custom {
            background-color: #343a40; /* Color de fondo de la barra de navegación */
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff; /* Color del texto de la barra de navegación */
        }

        .navbar-custom .nav-link:hover {
            color: #f8f9fa; /* Color del texto en hover */
        }

        .logout-btn {
            color: #ffffff; /* Color del texto del botón de cerrar sesión */
            border: none;
            background: none;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .logout-btn:hover {
            color: #f8f9fa; /* Color del texto en hover */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand" href="{{ url('/') }}">Inicio</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <!-- Otros enlaces de navegación -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
                </li>
            @endguest
        </ul>
        <ul class="navbar-nav ml-auto">
            @auth
                <form method="POST" action="{{ route('logout') }}" class="form-inline">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                    </button>
                </form>
            @endauth
        </ul>
    </div>
</nav>

<main>
    @yield('content')
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@yield('scripts')

<!-- Incluir Font Awesome para el ícono (si no está ya incluido en tu proyecto) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
