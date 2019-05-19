<?php

namespace Upanel\Http\Controllers;

use Illuminate\Http\Request;
use Upanel\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        Category::create($request->all());

        return redirect()->back();
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect()->back();
    }

    public function deactive(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }

    public function trashed()
    {
        $categories = Category::onlyTrashed()->get();
        return view('categories.trashed', compact('categories'));
    }

    public function active(Category $category)
    {
        dd($category);
        $category->restore();
        return redirect()->back();
    }
}
