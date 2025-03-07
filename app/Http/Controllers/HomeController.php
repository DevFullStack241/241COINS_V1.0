<?php

namespace App\Http\Controllers;

use App\Models\Etablishment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $etablishments = Etablishment::with('category')->get();
        return view('font_end.pages.home', compact('etablishments'));
    }
    public function landing()
    {
        return view('font_end.pages.landing.landing');
    }
}
