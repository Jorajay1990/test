@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Catálogo de Productos</h1>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><strong>Precio:</strong> ${{ $product->price }}</p>
                            <a href="{{ route('catalog.show', $product->id) }}" class="btn btn-primary">Ver Producto</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Enlace para volver a la página de inicio -->
        <div class="mt-3">
            <a href="{{ url('/') }}" class="btn btn-primary">Volver a la página de inicio</a>
        </div>

    </div>
@endsection
