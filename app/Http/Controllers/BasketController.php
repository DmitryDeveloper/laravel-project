<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function store(Request $request)
    {
        $productId = $request->input("product_id");
        $userID = Auth::id();
        $basket = new Basket();
        $basket->user_id = $userID;
        $basket->product_id = $productId;
        $basket->save();

        return response()->json($basket);
    }

    public function index()
    {
        $currentUserId = Auth::id();
        $basketProductIds = Basket::where('user_id', $currentUserId)->get(['product_id']);
        $products = Product::whereIn('id', $basketProductIds)->get();

        return response()->json($products);
    }

    public function remove(int $productId)
    {
        $currentUserId = Auth::id();
        Basket::where('product_id', $productId)->where('user_id',$currentUserId)->delete();

        return response()->noContent();
    }

    public function clean()
    {
        Basket::where('user_id', Auth::id())->delete();

        return response()->noContent();
    }
}
