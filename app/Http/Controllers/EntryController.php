<?php

namespace Upanel\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Upanel\CheckEntry;
use Upanel\CheckSale;
use Upanel\Entry;
use Upanel\Item;
use Upanel\Person;
use Upanel\Provider;

class EntryController extends Controller
{
    public function index()
    {
        $entries = Entry::all();
        return view('entries.index', compact('entries'));
    }

    public function create()
    {
        $items = Item::all();
        $providers = Provider::all();
        return view('entries.create', compact('items', 'providers'));
    }

    public function store(Request $request)
    {
        $quantity = $request->quantity;
        $price = $request->price;
        $subTotal = $quantity * $price;
        $tax = $subTotal * 0.19;
        $entry = Entry::create([
            'provider_id' => $request->provider_id,
            'user_id' => Auth::id(),
            'type_voucher' => 1,
            'series_voucher' => 1,
            'num_voucher' => 1,
            'tax' => 0,
            'total' => $subTotal,
            'state' => 1,
        ]);

        CheckEntry::create([
            'id_entry' => $entry->id,
            'id_item' => $request->item_id,
            'price' => $request->price,
            'quantity' => $quantity,
        ]);
        return redirect()->back()->with('success', "La compra ha sido creada con éxito.");

    }

    public function deactive($entry)
    {
        $entry = Entry::findOrFail($entry);
        $entry->state = 'Anulada';
        $entry->save();
        return redirect()->back()->with('success', "La compra ha sido anulada con éxito.");

    }
}
