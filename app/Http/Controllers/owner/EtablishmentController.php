<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Etablishment;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EtablishmentController extends Controller
{
    /**
     * Afficher la liste des établissements du propriétaire connecté.
     */
    public function index()
    {
        $etablishments = Etablishment::where('owner_id', auth()->id())
            ->with('category')
            ->latest()
            ->paginate(6); // Pagination à 6 par page

        // Récupération des pages pour la pagination personnalisée
        $currentPage = $etablishments->currentPage();
        $lastPage = $etablishments->lastPage();

        return view('back.pages.owner.etablishment.index', compact('etablishments', 'currentPage', 'lastPage'));
    }

    /**
     * Afficher le formulaire de création d'un établissement.
     */
    public function create()
    {
        $categories = Category::all();
        return view('back.pages.owner.etablishment.create', compact('categories'));
    }

    /**
     * Enregistrer un nouvel établissement.
     */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'address' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|in:ouvert,fermer',
            'email' => 'nullable|email|unique:etablishments,email',
            'phone_whatsapp' => 'nullable|string',
            'phone_service' => 'nullable|string',
            'website' => 'nullable|url',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'opening_hours' => 'nullable|string',
            'services' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Création de l'établissement
        $etablishment = new Etablishment();
        $etablishment->fill($request->all());
        $etablishment->owner_id = auth()->id();

        // Gestion de l'image
        if ($request->hasFile('cover_image')) {
            $etablishment->cover_image = $request->file('cover_image')->store('etablishments', 'public');
        }

        $etablishment->save();

        return redirect()->route('owner.etablishment.index')->with('success', 'Établissement ajouté avec succès.');
    }

    /**
     * Afficher les détails d'un établissement.
     */
    public function show($id)
    {
        $etablishment = Etablishment::with('category')->findOrFail($id);


        // Vérifie si l'utilisateur est connecté en tant que client ou propriétaire
        if (auth('client')->check() || auth('owner')->check()) {
            $etablishment->load(['comments' => function ($query) {
                $query->with('client', 'owner')->orderBy('created_at', 'desc');
            }]);
        }


        return view('back.pages.owner.etablishment.show', compact('etablishment'));
    }

    /**
     * Afficher le formulaire d'édition d'un établissement.
     */
    public function edit($id)
    {
        $etablishment = Etablishment::where('id', $id)
            ->where('owner_id', auth()->id())
            ->firstOrFail();

        $categories = Category::all();

        return view('back.pages.owner.etablishment.edit', compact('etablishment', 'categories'));
    }

    /**
     * Mettre à jour un établissement.
     */
    public function update(Request $request, $id)
    {
        // Vérification que l'établissement appartient bien au propriétaire connecté
        $etablishment = Etablishment::where('id', $id)
            ->where('owner_id', auth()->id())
            ->firstOrFail();

        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'opening_hours' => 'nullable|string|max:255',
            'status' => 'required|in:ouvert,fermer',
            'phone_whatsapp' => 'nullable|string',
            'phone_service' => 'nullable|string',
            'website' => 'nullable|url',
            'email' => 'nullable|email|unique:etablishments,email,' . $id,
            'services' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Mise à jour de l'image (suppression de l'ancienne si une nouvelle est uploadée)
        if ($request->hasFile('cover_image')) {
            if ($etablishment->cover_image) {
                Storage::disk('public')->delete($etablishment->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('etablishments', 'public');
        }

        // Mise à jour des données
        $etablishment->update($validated);

        return redirect()->route('owner.etablishment.index')->with('success', 'Établissement mis à jour avec succès.');
    }

    /**
     * Supprimer un établissement.
     */
    public function destroy($id)
    {
        // Vérification que l'établissement appartient bien au propriétaire connecté
        $etablishment = Etablishment::where('id', $id)
            ->where('owner_id', auth()->id())
            ->firstOrFail();

        try {
            // Suppression de l'image si elle existe
            if ($etablishment->cover_image) {
                Storage::disk('public')->delete($etablishment->cover_image);
            }

            // Suppression de l'établissement
            $etablishment->delete();

            return redirect()->route('owner.etablishment.index')->with('success', 'Établissement supprimé avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('owner.etablishment.index')->with('fail', 'Erreur lors de la suppression.');
        }
    }
}
