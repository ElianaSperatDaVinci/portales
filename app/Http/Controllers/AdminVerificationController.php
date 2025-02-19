<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminVerificationController extends Controller
{
    public function confirmForm()
    {
        return view('discos.check-admin');
    }
}
