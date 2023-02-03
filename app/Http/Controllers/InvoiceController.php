<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use App\Models\Compras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{

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

    public function store(Request $request)
    {
        //
    }

    public function show(Invoice $invoice)
    {
        //
    }

    public function edit(Invoice $invoice)
    {
        //
    }

    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    public function destroy(Invoice $invoice)
    {
        //
    }
}
