<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
       return response()->json(Category::all());
    }

    public function show(int $id)
    {
       return response()->json(Category::findOrFail($id));
    }

    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->input('name'),
        ]);

       return response()->json($category);
    }

    public function delete(int $id)
    {
        Category::destroy($id);
    }

    public function update(int $id, Request $request)
    {
        $category = Category::update([
            'name' => $request->input('name'),
        ]);

       return response()->json($category);
    }
}
