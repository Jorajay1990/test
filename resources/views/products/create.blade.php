@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Crear Producto</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre del Producto</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" class="form-control" id="description" rows="3" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" name="price" class="form-control" id="price" step="0.01" value="{{ old('price') }}" required>
            </div>

            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" name="stock" class="form-control" id="stock" value="{{ old('stock') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Crear Producto</button>
        </form>
    </div>
@endsection
