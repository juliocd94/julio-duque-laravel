<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Compras;
use App\Models\Tax;

class ProductoController extends Controller
{
    public function new()
    {
        $taxes = Tax::all();
        return view('new-product')->with('taxes', $taxes);
    }

    public function index()
    {
        $producto = Product::where('active', true)->with('tax')->get();
        $comprasDelUsuario = Compras::where('user_id', auth()->user()->id)->get();
        return view('products')->with('data', $producto)->with('comprasDelUsuario', $comprasDelUsuario);
    }

    public function store(Request $request)
    {
        $data = new Product();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->taxes_id = $request->tax;
        $data->active = true;
        $data->save();
        return redirect('/panel-administrativo');
    }

    public function update(Request $request)
    {
        $data = Product::find($request->id);
        $data->name = $request->name;
        $data->price = $request->price;
        $data->taxes_id = $request->tax;
        $data->save();
        return redirect('/panel-administrativo');
    }

    public function destroy(Request $request)
    {
        $producto = Product::find($request->id);
        $producto->active = false;
        $producto->save();
        return redirect('/panel-administrativo');
    }

    public function edit(Request $request)
    {
        $producto = Product::find($request->id);
        $taxes = Tax::all();
        return view('/edit-product')->with('producto', $producto)->with('taxes', $taxes);
    }
}
