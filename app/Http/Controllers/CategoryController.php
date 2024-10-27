<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'category_name' => 'required|unique:category_models,name',  // Specify table and column name
        ]);

        try {
            CategoryModel::create([
                'name' => $validate['category_name']
            ]);

            return redirect()->route('events.index')->with('success', 'Category created successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['category_name' => 'The category name must be unique and contain valid characters.']);
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $category_name = CategoryModel::find($id);
        $request->validate([
            'category_name' => 'required|unique:category_models,name',  // Specify table and column name
        ]);

        $category_name->name = $request->input('category_name');
        $category_name->save();

        return redirect()->route('home.index')->with('success', 'category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
