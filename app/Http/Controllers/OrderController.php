<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Product $product, Request $request)
    {
        $user = auth()->user();

        // Crear un nuevo pedido
        $order = Order::create([
        'user_id' => $user->id,
        'product_id' => $product->id,
        'amount' => $product->price,
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('orders.index')->with('success', 'Producto comprado con éxito');
    }
}
