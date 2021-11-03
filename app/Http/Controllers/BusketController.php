<?php

namespace App\Http\Controllers;

use App\Models\Busket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusketController extends Controller
{
    public function store(Request $request)
    {
        $productId = $request->input("product_id");
        $userID = Auth::id();
        $basket = new Busket();
        $basket->user_id = $userID;
        $basket->product_id = $productId;
        $basket->save();

        return response()->json($basket);
    }

    public function index()
    {
        return response()->json(Busket::all());
    }

    public function deleteId(int $id)
    {
        $result = Busket::destroy($id);
        return response()->json($result);
    }

    public function remove()
    {
        $result = Busket::truncate();
        return response()->json($result);
    }
}
