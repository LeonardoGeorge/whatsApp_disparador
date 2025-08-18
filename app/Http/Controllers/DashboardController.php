<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Mostra o dashboard com o formulário de disparo
     */
    public function index()
    {
        return view('dashboard');
    }
}
