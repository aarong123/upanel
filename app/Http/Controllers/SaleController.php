<?php

namespace Upanel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Upanel\CheckEntry;
use Upanel\CheckSale;
use Upanel\Entry;
use Upanel\Item;
use Upanel\Sale;
use Upanel\Person;
use Upanel\Provider;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));

    }

    public function create()
    {
        $persons = Person::all();
        //$users = User::all();
        $items = Item::all();
        return view('sales.create', compact('persons','items'));
    }

    public function store(Request $request)
    {
        $quantity = $request->quantity;
        $price = $request->price;
        $discount = $request->discount;
        $subTotal = $quantity * $price;
        $subdiscount = $subTotal*($discount/100);
        $endTotal=$subTotal-$subdiscount;

        //$tax = $subTotal * 0.19;
        $sale = Sale::create([
            'id_client' => $request->id_client,
            'id_user' => Auth::id(),
            'type_voucher' => 1,            
            'series_voucher' => 1,            
            'num_voucher' => 1,
            'tax' => 0,
            'total' => $endTotal,
            'state' => 1,
        ]);

        CheckSale::create([
            'id_sale' => $sale->id,
            'id_item' => $request->item_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'discount' => $request->discount
        ]);
        return redirect()->back()->with('success', "La venta ha sido creada");

    }

    public function deactive($sale)
    {
        $sale = Sale::findOrFail($sale);
        $sale->state = 'Anulado';
        $sale->save();
        return redirect()->back()->with('success', "La venta a sido anulada con exito");

    }

}
