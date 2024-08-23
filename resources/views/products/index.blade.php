@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Lista de Productos</h1>

        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Agregar Nuevo Producto</a>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <!-- Agregar botones para editar o eliminar si es necesario -->
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
