<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use App\Models\Compras;
use App\Models\InvoiceCompras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function show(Request $request)
    {
        $invoice = Invoice::find($request->invoice_id);
        $compras = Compras::where('invoice_id', $invoice->id)->get();

        return view('/detalle-de-factura')
        ->with('compras', $compras)
        ->with('invoice', $invoice);
    }

    public function store(Request $request)
    {
        $clientes = Compras::where('invoiced', 0)->select('user_id')->groupByRaw('user_id')->get();

        if(!empty($clientes)){
            foreach($clientes as $cliente){
                $compras = Compras::where('user_id', $cliente->user->id)
                ->where('invoiced', false)
                ->get();
                
                $factura = new Invoice();
                $factura->user_id = $cliente->user->id;
                $amount = 0;
                $tax = 0;
                
                foreach($compras as $compra){
                    $amount = $amount + (($compra->price*$compra->tax)/100) + $compra->price;
                    $tax = $tax + ($compra->price*$compra->tax)/100;
                    $compra->invoiced = true;
                    $factura->amount = $amount;
                    $factura->total_tax = $tax;
                    $factura->save();
                    $compra->invoice_id = $factura->id;
                    $compra->save();
                }
            }
            return redirect()->route('panel');
        }
        return redirect()->route('panel');
    }
}
