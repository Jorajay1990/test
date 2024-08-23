@extends('layouts.app')

@section('title', 'Lista de Usuarios')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Usuarios</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                Usuarios
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Contraseña por defecto</th>
                        <th>Rol</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <!-- Mostrar la contraseña por defecto -->
                            <td><strong></strong> default_password</td>
                            <td>
                                <form action="{{ route('users.updateRole', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="role_id" class="form-control" onchange="this.form.submit()">
                                        <option value="">Seleccione un rol</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td>
                                <!-- Aquí podrías agregar botones para otras acciones si es necesario -->
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Enlace para volver a la página de inicio -->
        <div class="mt-3">
            <a href="{{ url('/') }}" class="btn btn-primary">Volver a la página de inicio</a>
        </div>

    </div>
@endsection
