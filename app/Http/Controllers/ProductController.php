<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        response()->json(Product::all());
    }

    public function show(int $id)
    {
        response()->json(Product::findOrFail($id));
    }

    public function store(Request $request)
    {
        $user = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => $request->input('user_id'),
            'category_id' => $request->input('category_id'),
        ]);

        response()->json($user);
    }

    public function delete(int $id)
    {
        User::destroy($id);
    }

    public function update(int $id, Request $request)
    {
        $user = Product::update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => $request->input('user_id'),
            'category_id' => $request->input('category_id'),
        ]);

        response()->json($user);
    }
}
