<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    public function store(Request $request)
    {
        $compra = new Compras();
        $compra->user_id = $request->user_id;
        $compra->product_id = $request->product_id;
        $compra->price = $request->price;
        $compra->tax = $request->tax; 
        $compra->save();
        
        return redirect()->route('productos.index');
    }
}
