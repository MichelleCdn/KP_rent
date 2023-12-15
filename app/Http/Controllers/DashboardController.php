<?php

namespace App\Http\Controllers;

use Dentro\Yalr\Attributes\Get;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    #[Get('dashboard', name: 'dashboard')]
    function index() {
        return view('dashboard');
    }
}
