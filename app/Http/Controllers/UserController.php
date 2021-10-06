<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = new User();
        return view('users', ['data' => $user->all()]);
    }

    public function show($id)
    {
        $user = new User();
        return view('one-users', ['data' => $user->find($id)]);
    }

    public function store(Request $req)
    {
        $user = new User();
        $user->first_name = $req->input('first_name');
        $user->last_name = $req->input('last_name');
        $user->role = $req->input('role');
        $user->email = $req->input('email');
        $user->password = $req->input('password');

        $user->save();

    }

    public function delete($id)
    {
        User::find($id)->delete();
    }
}
