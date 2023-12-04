<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.login'); // Assumindo que você tem uma view admin/login.blade.php
    }



    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Tentativa de login
        if (Auth::guard('admin')->attempt($credentials)) {
            // Verificar se o usuário é um administrador
            if (Auth::user()->is_admin) {
                return redirect()->intended('/admin'); // Redirecionar para a dashboard do admin
            } else {
                Auth::logout(); // Deslogar se não for um administrador
            }
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros ou você não tem permissão de administrador.',
        ]);
    }
}
