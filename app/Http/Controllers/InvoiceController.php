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

    public function index()
    {
        //
    }

    public function details(Request $request)
    {

        $invoice = Invoice::find($request->invoice_id);
        $compras = Compras::where('invoice_id', $invoice->id)->get();

        return view('/detalle')->with('compras', $compras)->with('invoice', $invoice);

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
                    $data->amount = $amount;
                    $data->total_tax = $tax;
                    $data->save();
                    $compra->invoice_id = $data->id;
                    $compra->save();
                }
            }
            return redirect('/panel-administrativo');
        }
        return redirect('/panel-administrativo');
    }
}
