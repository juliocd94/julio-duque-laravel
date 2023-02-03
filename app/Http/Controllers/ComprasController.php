<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Invoice;
use App\Models\Product;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function index()
    {
        $compras = Compras::with('user')->with('product')->get();
        $invoices = Invoice::with('client')->get();
        $productos = Product::where('active', true)->get();
        return view('home')->with('compras', $compras)->with('invoices', $invoices)->with('productos', $productos);
    }

    public function store(Request $request)
    {
        $producto = Product::with('tax')->get();
        $comprasDelUsuario = Compras::where('user_id', $request->user_id)->get();
        $data = new Compras();
        $data->user_id = $request->user_id;
        $data->product_id = $request->product_id;
        $data->price = $request->price;
        $data->tax = $request->tax; 
        $data->save();
        
        return view('products')->with('data', $producto)->with('comprasDelUsuario', $comprasDelUsuario);
    }
}
