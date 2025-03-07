<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all(); // Récupére toutes les categories
        return view('back.pages.admin.categorie.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('back.pages.admin.categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Création du categorie
        Category::create($validated);

        // Redirection avec message de succès
        return redirect()->route('admin.categorie.index')->with('success', 'Categorie créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categories = Category::findOrFail($id);
        return view('back.pages.admin.categorie.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('back.pages.admin.categorie.edit', compact('categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categories = Category::findOrFail($id);

        // Validation des champs avec une règle d'unicité pour l'email qui ignore l'email actuel
        $request->validate([
            'name' => 'required|string|max:255',

        ]);

        // Mise à jour des données du categorie
        $categories->update($request->all());

        return redirect()->route('admin.categorie.index')->with('success', 'Categorie mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Trouver le categorie par ID
        $categories = Category::findOrFail($id);

        // Supprimer le categorie
        $deleted = $categories->delete();

        if ($deleted) {
            return redirect()->route('admin.categorie.index')->with('success', 'Categorie supprimé avec succès.');
        } else {
            return redirect()->route('admin.categorie.index')->with('fail', 'Une erreur s\'est produite lors de la suppression.');
        }
    }
}
