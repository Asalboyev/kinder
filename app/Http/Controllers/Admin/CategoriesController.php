<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->get();
        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name_uz' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
        ]);
        $requestData = $request->all();

        $category = Category::create($requestData);
        return redirect()->route('admin.categories.index')->with('success', 'Category created succuessfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([

            'name_uz' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
        ]);
        $requestData = $request->all();

        $category->update($requestData);
        return redirect()->route('admin.categories.index')->with('success', 'Category update succuessfuly');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id )
    {
        Category::destroy($id);
        return redirect()->route('admin.categories.index')->with('success', 'Category Delete succuessfuly');
    }
}
