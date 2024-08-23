<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    // Mostrar todos los productos en el catálogo (público)
    public function index()
    {
        $products = Product::all();
        return view('catalog.index', compact('products'));
    }

    // Mostrar detalles de un producto (público)
    public function show(Product $product)
    {
        return view('catalog.show', compact('product'));
    }

    // Mostrar formulario para crear un nuevo producto (solo administradores)
    public function create()
    {
        return view('products.create');
    }

    // Almacenar un nuevo producto en la base de datos (solo administradores)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Producto creado con éxito');
    }

    // Mostrar todos los productos en la vista de administración (solo administradores)
    public function indexAdmin()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
}
