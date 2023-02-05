<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compras;
use App\Models\Invoice;
use App\Models\Product;

class PanelController extends Controller
{
    public function index()
    {
        $compras = Compras::with('user')->with('product')->get();
        $invoices = Invoice::with('client')->get();
        $productos = Product::where('active', true)->get();

        return view('panel-administrativo')
        ->with('compras', $compras)
        ->with('invoices', $invoices)
        ->with('productos', $productos);
    }
}
