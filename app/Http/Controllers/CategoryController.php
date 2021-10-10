<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

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
        $result = Category::destroy($id);
        return response()->json($result);
    }


    public function update($id, Request $request)
    {
        $category = Category::where('id', $id)
            ->update(['name' => $request->input('name')]);
        return response()->json($category);
    }
}
