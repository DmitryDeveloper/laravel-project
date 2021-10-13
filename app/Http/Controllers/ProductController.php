<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\ProductStoreRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }

    public function show(int $id)
    {
        return response()->json(Product::findOrFail($id));
    }

    public function store(ProductStoreRequest $request)
    {
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => $request->input('user_id'),
            'category_id' => $request->input('category_id'),
        ]);

        return response()->json($product);
    }

    public function delete(int $id)
    {
        $result = Product::destroy($id);
        return response()->json($result);
    }

    public function update($id, ProductUpdateRequest $request)
    {
        $product = Product::where('id', $id)->update($request->all());

        return response()->json($product);
    }

    public function search(Request $request)
    {
        $name = $request->input("keyword");
        $result = Product::where('name', 'LIKE', "$name%")->get();

        return Response()->json($result);
    }
}
