<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\InvoiceController;

Route::get('/', function () {
    return redirect('login');
});
Route::post('/', [AuthController::class, 'logout']);
Route::view('/login', 'login');
Route::post('/login', [AuthController::class, 'login']);
Route::view('/register', 'register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/emitir-facturas', [InvoiceController::class, 'store'])->name('factura.store');
Route::post('/mostrar-detalle', [InvoiceController::class, 'show'])->name('invoice.show');
Route::get('/panel-administrativo', [PanelController::class, 'index'])->name('panel');
Route::get('/nuevo-producto', [ProductoController::class, 'create'])->name('producto.create');
Route::post('/nuevo-producto', [ProductoController::class, 'store'])->name('productos.store');
Route::post('/editar-producto', [ProductoController::class, 'edit'])->name('producto.edit');
Route::post('/actualizar-producto', [ProductoController::class, 'update'])->name('producto.update');
Route::post('/eliminar-producto', [ProductoController::class, 'destroy'])->name('producto.delete');
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/productos', [ComprasController::class, 'store'])->name('producto.comprar');
