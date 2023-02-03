<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Invoice;
use Illuminate\Http\Request;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = Compras::with('user')->with('product')->get();
        $invoices = Invoice::with('client')->get();
        return view('home')->with('compras', $compras)->with('invoices', $invoices);
    }


    public function store(Request $request)
    {
        $data = new Compras();
        $data->user_id = $request->user_id;
        $data->product_id = $request->product_id;
        $data->price = $request->price;
        $data->tax = $request->tax; 
        $data->save();
        
        return view('products');
    }

    
    public function show(Compras $compras)
    {
        //
    }

   
    public function edit(Compras $compras)
    {
        //
    }


    public function update(Request $request, Compras $compras)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compras  $compras
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compras $compras)
    {
        //
    }
}
