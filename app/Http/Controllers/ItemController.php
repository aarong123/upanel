<?php

namespace Upanel\Http\Controllers;

use Illuminate\Http\Request;
use Upanel\Category;
use Upanel\Item;

class ItemController extends Controller
{

    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, Item $item)
    {
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
        return redirect()->back()->with('success',"El producto $item->name se ha actualizado con exito");
    }
}
