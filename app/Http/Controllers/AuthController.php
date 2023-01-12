<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function auth(Request $request, $credentials, $remember = false)
    {
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        if ($request->route()->named('registration'))
            return redirect('/registration')->with('login-success', 'Akun berhasil dibuat, silahkan login');

        return back()->withErrors([
            'login-error' => 'Gagal melakukan proses autentikasi. Mohon untuk mengisi email & password dengan benar.',
        ])->onlyInput('email');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        return $this->auth($request, $credentials, $request->input('remember'));
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return $this->auth($request, [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
