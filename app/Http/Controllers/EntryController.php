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
use Upanel\Http\Requests\EntryStoeRequest;
use Upanel\Http\Requests\EntryStoreRequest;

class EntryController extends Controller
{
    public function index()
    {
        $entries = Entry::all();
        //dd($entries[0]);
        return view('entries.index', compact('entries'));
    }

    public function create()
    {
        $items = Item::all();
        $providers = Provider::all();
        return view('entries.create', compact('items', 'providers'));
    }

    public function store(EntryStoreRequest $request)
    {
        $quantity = $request->quantity;
        $price = $request->price;
        $subTotal = $quantity * $price;
        $iva = $subTotal * 0.19;
        $total = $subTotal + $iva;
        $entry = Entry::create([
            'provider_id' => $request->provider_id,
            'user_id' => Auth::id(),
            'tax' => $iva,
            'total' => $total,
            'state' => 'Activa',
        ]);

        CheckEntry::create([
            'id_entry' => $entry->id,
            'id_item' => $request->item_id,
            'price' => $request->price,
            'quantity' => $quantity,
        ]);
        return redirect()->back()->with('success', "La compra se ha registrado con éxito.");

    }

    public function deactive($entry)
    {
        $entry = Entry::findOrFail($entry);
        $entry->state = 'Anulada';
        $entry->save();
        return redirect()->back()->with('success', "La compra se ha anulado con éxito.");

    }
}
