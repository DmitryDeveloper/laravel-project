<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        response()->json(User::all());
    }

    public function show($id)
    {
        response()->json(User::find($id));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user = $user::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        response()->json($user);
    }

    public function delete($id)
    {
        User::find($id)->delete();
    }

    public function update($id, Request $request)
    {
        $user = new User();

        $user = $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'role' => $request->input('role'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        response()->json($user);
    }
}
