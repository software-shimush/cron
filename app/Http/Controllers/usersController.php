<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class usersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.users')->with('users',  $users);
    }
}
