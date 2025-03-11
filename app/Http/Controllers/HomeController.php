<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Etablishment;
use App\Models\Owner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $etablishments = Etablishment::with('category')->get();
        $clients = Client::all(); // Récupère tous les clients
        return view('font_end.pages.home', compact('etablishments', 'clients'));
    }
    public function landing()
    {
        return view('font_end.pages.landing.landing');
    }

    public function apropos()
    {
        return view('font_end.pages.apropos');
    }

    public function contact()
    {
        return view('font_end.pages.contact');
    }

    public function detail($id)
    {
        $etablishment = Etablishment::with('category')->findOrFail($id);


        // Charger les commentaires avec les auteurs (clients et propriétaires)
        $etablishment->load(['comments' => function ($query) {
            $query->with('client', 'owner')->orderBy('created_at', 'desc');
        }]);

        return view('font_end.pages.detail', compact('etablishment'));
    }
}
