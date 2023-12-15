<?php

namespace App\Http\Controllers;

use Dentro\Yalr\Attributes\Get;
use Dentro\Yalr\Attributes\Post;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    #[Get('login', name: 'view-login')]
    function viewLogin()
    {
        return view('auth.login');
        // return view('app');
    }

    #[Post('login', name: 'login')]
    function login(Request $request): bool
    {
        $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return true;
        }
        return false;
    }
}
