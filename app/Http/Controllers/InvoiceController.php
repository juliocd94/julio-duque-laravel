<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use App\Models\Compras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function details(Request $request)
    {

        $factura = Invoice::where('id', $request->invoice_id)->get();

        // PENDIENTE REVISAR COLLECTION

        $usuario = User::where('id', $factura[0]->id)->get();

        return $usuario;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $clientes = Compras::where('invoiced', 0)->select('user_id')->groupByRaw('user_id')->get();

        if(!empty($clientes)){
            foreach($clientes as $cliente){
                $compras = Compras::where('user_id', $cliente->user->id)->get();
                
                $data = new Invoice();
                $data->user_id = $cliente->user->id;
                $amount = 0;
                $tax = 0;
                
                foreach($compras as $compra){
                    $amount = $amount + (($compra->price*$compra->tax)/100) + $compra->price;
                    $tax = $tax + ($compra->price*$compra->tax)/100;
                    $compra->invoiced = true;
                    $compra->invoice_id = $data->id;
                    $compra->save();
                }
                $data->amount = $amount;
                $data->total_tax = $tax;
                $data->save();
            }
            return redirect('/panel-administrativo');
        }
        return redirect('/panel-administrativo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
