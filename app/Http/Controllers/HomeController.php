<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function myHome() {
    return 'Halaman dari HomeController';
    }

    public function about(): View {
    return view('about');
    }

    public function contact(): View {
    return view('contact');
    }

}

