<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Client;;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Afficher la liste des propriétaires.
     */
    public function index()
    {
        $clients = Client::all();
        return view('back.pages.admin.client.index', compact('clients'));
    }

    /**
     * Afficher les détails d'un propriétaire.
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('back.pages.admin.client.show', compact('client'));
    }

    /**
     * Supprimer un propriétaire.
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        // Supprimer l'image associée si elle existe
        if ($client->picture) {
            Storage::disk('public')->delete($client->picture);
        }

        $client->delete();

        return redirect()->route('admin.client.index')->with('success', 'Client supprimé avec succès.');
    }
}