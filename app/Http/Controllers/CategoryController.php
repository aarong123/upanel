<?php

namespace Upanel\Http\Controllers;

use Illuminate\Http\Request;
use Upanel\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withTrashed()->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());

        return redirect()->back()->with('success', "La categoría $category->name se ha creado con exito");
    }

    public function edit($category)
    {
        $category = Category::withTrashed()->whereId($category)->first();
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $category)
    {
        $category = Category::withTrashed()->whereId($category)->first();

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect()->back()->with('success', "La categoría $category->name se ha actualizado con exito");
    }

    public function deactive(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', "La categoría $category->name se ha desactivado con exito");
    }

    public function active($category)
    {
        $category = Category::withTrashed()->whereId($category)->first();
        $category->restore();
        return redirect()->back()->with('success', "La categoría $category->name se ha activado con exito");
    }
}
