<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'The name field must be filled in.',
            'name.max' => 'The name must be less than 40 characters.'
        ];
        $validatedData = $request->validate([
            'name' => 'required | max:40'
        ]);
    
        $category = new Category;
        $category->name = $validatedData['name'];
        $category->save();
    
        return redirect('/category')->with('success', 'Category was made with success!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('category.edit')
                ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'name.required' => 'The name field must be filled in.',
            'name.max' => 'The name must be less than 40 characters.'
        ];
        $validatedData = $request->validate([
            'name' => 'required | max:40'
        ]);
        $category = Category::find($id);
        $category->name = $validatedData['name'];
        $category->save();
        return redirect('/category')->with('success', 'Category succesfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect('/category')->with('success', 'Category deleted successfully!');
    }
}
