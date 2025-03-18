<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Etablishment;
use App\Models\Like;
use App\Models\Owner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $etablishments = Etablishment::with('category')
            ->latest() // Trie du plus récent au plus ancien
            ->take(6) // Limite à 6 établissements
            ->get();

        // Récupérer tous les clients
        $clients = Client::all();

        $categories = Category::all();
        $owners = Owner::all();

        // Compter le nombre total de clients
        $totalClients = $clients->count();

        $totalEtablishments = $etablishments->count();

        $totalCategories = $categories->count();
        $totalOwners = $owners->count();

        return view('font_end.pages.home', compact('etablishments', 'totalClients', 'clients', 'totalEtablishments', 'categories', 'totalCategories', 'owners', 'totalOwners'));
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
        // Récupérer les propriétaires

        $clientReaction = null;
        $likes = Like::where('etablishment_id', $etablishment->id)->where('type', 'like')->count();
        $dislikes = Like::where('etablishment_id', $etablishment->id)->where('type', 'dislike')->count();

        // Charger les commentaires avec les auteurs (clients et propriétaires)
        $etablishment->load(['comments' => function ($query) {
            $query->with('client', 'owner')->orderBy('created_at', 'desc');
        }]);

        return view('font_end.pages.detail', compact('etablishment', 'clientReaction', 'likes', 'dislikes'));
    }

    public function etablissement()
    {
        $etablishments = Etablishment::with('category')
            ->latest() // Trie du plus récent au plus ancien
            ->paginate(9); // Pagination à 9 par page

        $categories = Category::all(); // Récupération des catégories

        $clients = Client::all();

        return view('font_end.pages.etablissement', compact('etablishments', 'categories', 'clients'));
    }
}
