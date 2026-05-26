<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ini akan memanggil file tampilan bernama 'home.blade.php'
        return view('home'); 
    }
}