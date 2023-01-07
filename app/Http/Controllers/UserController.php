<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // ambil user login
        $user = User::first();
        return view('user.sections.user.index', [
            'user' => $user
        ]);
    }
}
