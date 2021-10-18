<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\CategoryStoreRequest;
use App\Http\Requests\Categories\CategoryUpdateRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Client\Request;

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

    public function store(CategoryStoreRequest $request)
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

    public function update($id, CategoryUpdateRequest $request)
    {
        $category = Category::where('id', $id)
            ->update(['name' => $request->input('name')]);
        return response()->json($category);
    }

    public function productsCount()
    {
        $categories = Category::all();
        $result = [];
        foreach ($categories as $category) {
            $result[$category->name] = Product::where('category_id', $category->id)->count();
        }
        return response()->json($result);
    }

    public function getProductsByCategoryId($id)
    {
        $category = Category::findOrFail($id);
        $result = [];
        $result[$category->name] = Product::where('category_id', $category->id)->pluck('name');

        return response()->json($result);
    }
}
