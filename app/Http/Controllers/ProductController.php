<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\ProductStoreRequest;
use App\Http\Requests\Products\ProductUpdateRequest;
use App\Models\Product;
use App\Http\Requests\Products\ProductSearchRequest;
use Illuminate\Support\Facades\Storage;

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

        $imgStore = $request->file('image_path')->store('images', 'public');
        $product->image_path = Storage::disk('public')->url($imgStore);
        $product->save();

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

    public function search(ProductSearchRequest $request)
    {
        $name = $request->input("keyword");
        $result = Product::where('name', 'LIKE', "$name%")->get();

        return Response()->json($result);
    }
}
