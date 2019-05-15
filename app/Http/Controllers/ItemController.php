<?php

namespace Upanel\Http\Controllers;

use Illuminate\Http\Request;
use Upanel\Item;

class ItemController extends Controller
{
    //
    public function index(){
        $items = Item::all();
        return view('items.index', compact('items'));
    }
}
