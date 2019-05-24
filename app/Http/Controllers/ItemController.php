<?php

namespace Upanel\Http\Controllers;

use Illuminate\Http\Request;
use Upanel\Category;
use Upanel\Item;

class ItemController extends Controller
{

    public function index(){
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function edit(Item $item)
    {
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }
}
