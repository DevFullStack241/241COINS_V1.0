<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Client;
use App\Models\Etablishment;
use App\Models\Owner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $totalClients = Client::count(); // Récupérer le nombre total de clients
        $totalOwners = Owner::count(); // Récupérer le nombre total de clients
        $totalEtablishments = Etablishment::count(); // Récupérer le nombre total de clients
        $totalCategories = Category::count(); // Récupérer le nombre total de clients

        $clients = Client::all(); // Récupérer la liste des clients
        $owners = Owner::all(); // Récupérer la liste des propriétaires
        $etablishments = Etablishment::all(); // Récupérer la liste des établissements
        return view('back.pages.admin.home', compact('totalClients', 'totalOwners', 'totalEtablishments', 'totalCategories', 'clients', 'owners', 'etablishments'));
    }
}
