<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Etablishment;
use App\Models\Client;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Afficher la liste des avis.
     */
    public function index()
    {
        $reviews = Review::with('etablishment', 'client')->get();
        return view('back.pages.admin.review.index', compact('reviews'));
    }

    /**
     * Afficher le formulaire de création d'un avis.
     */
    public function create()
    {
        $etablishments = Etablishment::all();
        $clients = Client::all();
        return view('back.pages.admin.review.create', compact('etablishments', 'clients'));
    }

    /**
     * Enregistrer un nouvel avis.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'etablishment_id' => 'required|exists:etablishments,id',
            'client_id' => 'required|exists:clients,id',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create($validated);

        return redirect()->route('admin.review.index')->with('success', 'Avis ajouté avec succès.');
    }

    /**
     * Afficher un avis spécifique.
     */
    public function show($id)
    {
        $review = Review::with('etablishment', 'client')->findOrFail($id);
        return view('back.pages.admin.review.show', compact('review'));
    }

    /**
     * Afficher le formulaire d'édition d'un avis.
     */
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        $etablishments = Etablishment::all();
        $clients = Client::all();
        return view('back.pages.admin.review.edit', compact('review', 'etablishments', 'clients'));
    }

    /**
     * Mettre à jour un avis.
     */
    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        $validated = $request->validate([
            'etablishment_id' => 'required|exists:etablishments,id',
            'client_id' => 'required|exists:clients,id',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review->update($validated);

        return redirect()->route('admin.review.index')->with('success', 'Avis mis à jour avec succès.');
    }

    /**
     * Supprimer un avis.
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.review.index')->with('success', 'Avis supprimé avec succès.');
    }
}
