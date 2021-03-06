<?php

namespace Upanel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Upanel\CheckEntry;
use Upanel\CheckSale;
use Upanel\Entry;
use Upanel\Http\Requests\SaleStoreRequest;
use Upanel\Item;
use Upanel\Sale;
use Upanel\Person;
use Upanel\Provider;
use Upanel\Http\Requests\SaleStoeRequest;

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
        $items = Item::where('stock', '>', 0)->get();
        return view('sales.create', compact('persons','items'));
    }


    public function store(SaleStoreRequest $request)
    {
        $quantity = $request->quantity;
        $price = $request->price;
        $discount = $request->discount;
        $subTotal = $quantity * $price;
        $iva = $subTotal*0.19;
        $subdiscount = $subTotal*($discount/100);
        $desTotal=$subTotal-$subdiscount;
        
        $sale = Sale::create([
            'id_client' => $request->id_client,
            'id_user' => Auth::id(),
            'tax' => $iva,
            'total' => $desTotal,
            'state' => "Activa",
        ]);

        CheckSale::create([
            'id_sale' => $sale->id,
            'id_item' => $request->item_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'discount' => $request->discount
        ]);
        return redirect()->back()->with('success', "La venta se ha registrado con éxito.");

    }

    public function deactive($sale)
    {
        $sale = Sale::findOrFail($sale);
        $sale->state = 'Anulada';
        $sale->save();
        return redirect()->back()->with('success', "La venta se ha anulado con éxito.");

    }

}
