<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        response()->json(Category::all());
    }

    public function show(int $id)
    {
        response()->json(Category::findOrFail($id));
    }

    public function store(Request $request)
    {
        $user = Category::create([
            'name' => $request->input('name'),
        ]);

        response()->json($user);
    }

    public function delete(int $id)
    {
        Category::destroy($id);
    }

    public function update(int $id, Request $request)
    {
        $user = Category::update([
            'name' => $request->input('name'),
        ]);

        response()->json($user);
    }
}
