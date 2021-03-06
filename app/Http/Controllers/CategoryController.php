<?php

namespace Upanel\Http\Controllers;

use Illuminate\Http\Request;
use Upanel\Category;
use Upanel\Http\Requests\CategoryStoreRequest;
use Upanel\Http\Requests\CategoryUpdateRequest;

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

    public function store(CategoryStoreRequest $request)
    {
        $category = Category::create($request->all());

        return redirect()->back()->with('success', "La categoría $category->name se ha registrado con éxito.");
    }

    public function edit($category)
    {
        $category = Category::withTrashed()->whereId($category)->first();
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryUpdateRequest $request, $category)
    {
        $category = Category::withTrashed()->whereId($category)->first();

        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect()->back()->with('success', "La categoría $category->name se ha actualizado con éxito.");
    }

    public function deactive(Category $category)
    {
        $category->delete();
        return redirect()->back()->with('success', "La categoría $category->name se ha desactivado con éxito.");
    }

    public function active($category)
    {
        $category = Category::withTrashed()->whereId($category)->first();
        $category->restore();
        return redirect()->back()->with('success', "La categoría $category->name se ha activado con éxito.");
    }
}
