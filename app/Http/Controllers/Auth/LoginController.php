<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        return Inertia::render('Auth/Login', [
            'login_art' => asset('images/login-art.jpeg'),
        ]);
    }
}
