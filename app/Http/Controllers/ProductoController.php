<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
        $producto = Product::with('tax')->get();
        return view('products')->with('data', $producto);
    }

    public function store(Request $request)
    {
        $data = new Product();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->taxes_id = $request->tax;
        $data->save();
        return redirect('/productos');
    }

    public function update(Request $request)
    {
        return $request;
        $producto = new Product();
        $data->name = $request->name;
        $data->price = $request->price;
        $data->taxes_id = $request->tax;
        $data->save();
        return redirect('/productos');
    }

    public function destroy(Request $request)
    {
        $producto = Product::findOrFail($request->id)->delete();
        return redirect('/productos');
    }

    public function edit(Request $request)
    {
        $producto = Product::findOrFail($request->id);
        $taxes = Tax::all();
        return view('/edit-product')->with('producto', $producto)->with('taxes', $taxes);
    }
}