<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




// Ruta para el logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');


// Rutas públicas
Route::get('catalog', [ProductController::class, 'index'])->name('catalog');
Route::get('catalog/{product}', [ProductController::class, 'show'])->name('catalog.show');

// Rutas para usuarios (crear y ver)
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/create-users', [UserController::class, 'createUsers'])->name('users.createUsers');
Route::put('/users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');

// Rutas protegidas para administradores (productos)
Route::middleware('auth')->group(function () {
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products', [ProductController::class, 'indexAdmin'])->name('products.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::post('order/create/{product}', [OrderController::class, 'create'])->name('order.create')->middleware('auth');


require __DIR__.'/auth.php';





