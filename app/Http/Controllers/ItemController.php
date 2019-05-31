<?php

namespace Upanel\Http\Controllers;

use Illuminate\Http\Request;
use Upanel\Category;
use Upanel\Item;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::withTrashed()->get();
        return view('items.index', compact('items'));

    }

    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $item = Item::create($request->all());

        return redirect()->back()->with('success', "El artículo $item->name se ha creado con exito");

    }

    public function edit($item)
    {
        $item = Item::withTrashed()->whereId($item)->first();
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $item)
    {
        $item = Item::withTrashed()->whereId($item)->first();
        $item->category_id = $request->category_id;
        $item->code = $request->code;
        $item->name = $request->name;
        $item->price_sale = $request->price_sale;
        $item->expiration_date = $request->expiration_date;
        $item->stock = $request->stock;
        $item->stock_threshold = $request->stock_threshold;
        $item->expiration_threshold = $request->expiration_threshold;
        $item->description = $request->description;
        $item->save();
        return redirect()->back()->with('success', "El producto $item->name se ha actualizado con éxito.");
    }

    public function active($item)
    {
        $item = Item::withTrashed()->whereId($item)->first();
        $item->restore();
        return redirect()->back()->with('success', "El producto $item->name se ha activado con éxito.");

    }

    public function deactive(Item $item)
    {
        $item->delete();
        return redirect()->back()->with('success', "El producto $item->name se ha desactivado con éxito.");

    }

}
