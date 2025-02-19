<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login-form');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        
        if(!auth()->attempt($credentials)){
            return redirect()
                ->route('auth.login.form')
                ->withInput()
                ->with('feedback.message', 'Mail o contraseña incorrectos.')
                ->with('feedback.type', 'danger');
        }

        return redirect()
            ->route('discos.index')
            ->with('feedback.message', 'Sesión iniciada correctamente.')
            ->with('feedback.type', 'success');
    }

    public function registerForm()
    {
        return view('auth.register-form');
    }

    public function logoutProcess(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.login.form')
            ->with('feedback.message', 'Sesión cerrada correctamente.');
    }
}
