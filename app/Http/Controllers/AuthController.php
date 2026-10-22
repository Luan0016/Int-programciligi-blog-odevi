<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // .env dosyasındaki verileri çek
        $envUsername = env('ADMIN_USERNAME');
        $envPassword = env('ADMIN_PASSWORD');

        if ($request->username === $envUsername && $request->password === $envPassword) {
            session(['is_admin' => true]);
            return redirect()->route('admin.create')->with('success', 'Giriş başarılı.');
        }

        return back()->withErrors(['login_error' => 'Kullanıcı adı veya şifre hatalı.']);
    }

    public function logout()
    {
        session()->forget('is_admin');
        return redirect()->route('home');
    }
}
