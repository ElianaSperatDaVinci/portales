<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show()
    {
        $usuario = Auth::user();
        return view('users.profile', ['usuario' => $usuario]);
    }
}
