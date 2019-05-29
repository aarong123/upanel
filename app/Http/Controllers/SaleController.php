<?php

namespace Upanel\Http\Controllers;

use Illuminate\Http\Request;

//use Upanel\Category;
use Upanel\Sale;


class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::withTrashed()->get();
        return view('sales.index', compact('sales'));

    }

    //public function create()
    //{
      //  $categories = Category::all();
        //return view('items.create', compact('categories'));
    //}

        public function create()
    {
        return view('sales.create');
    }

    public function store(Request $request)
    {
        $sale = Sale::create($request->all());

        return redirect()->back()->with('success', "se ha creado");

    }

    public function edit($sale)
    {
        $sale = Sale::withTrashed()->whereId($sale)->first();
        //$categories = Category::all();
        return view('sales.edit', compact('sale'));
    }

    public function update(Request $request, $sale)
    {
        $sale = Sale::withTrashed()->whereId($sale)->first();
        //$sale->category_id = $request->category_id;
        $sale->id_client = $request->id_client;
        $sale->id_user = $request->id_user;
        $sale->type_voucher = $request->type_voucher;
        $sale->series_voucher = $request->series_voucher;
        $sale->num_voucher = $request->num_voucher;
        $sale->tax = $request->tax;
        $sale->total = $request->total;
        $sale->state = $request->state;
        $sale->save();
        return redirect()->back()->with('success', " bien");
    }


}
