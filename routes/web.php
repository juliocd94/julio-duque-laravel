<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\InvoiceController;



Route::get('/', function () {
    return redirect('login');
});
Route::post('/', [AuthController::class, 'logout']);
Route::view('/login', 'login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/new-product', [ProductoController::class, 'new']);
Route::post('/new-product', [ProductoController::class, 'store']);
Route::view('/register', 'register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/productos', [ProductoController::class, 'index']);
Route::get('/panel-administrativo', [ComprasController::class, 'index']);
Route::post('/productos', [ComprasController::class, 'store'])->name('comprar');

Route::post('/productos-edit', [ProductoController::class, 'edit'])->name('edit');

Route::post('/emitir-facturas', [InvoiceController::class, 'create'])->name('emitir');


Route::post('/mostrar-detalle', [InvoiceController::class, 'details'])->name('detalle');

Route::put('/productos', [ComprasController::class, 'store'])->name('editar');
Route::post('/productos-eliminar', [ProductoController::class, 'destroy'])->name('eliminar');
