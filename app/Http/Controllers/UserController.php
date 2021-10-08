<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function show(int $id)
    {
        return response()->json(User::findOrFail($id));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return response()->json($user);
    }

    public function delete(int $id)
    {
        $result = User::destroy($id);
        return response()->json($result);
    }

    public function update(int $id, Request $request)
    {
        $user = User::update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return response()->json($user);
    }
}
