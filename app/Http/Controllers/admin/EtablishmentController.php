<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Etablishment;
use App\Models\Owner;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EtablishmentController extends Controller
{
    /**
     * Afficher la liste des établissements.
     */
    public function index()
    {
        $etablishments = Etablishment::with('owner', 'category')->get();
        return view('back.pages.admin.etablishment.index', compact('etablishments'));
    }

    /**
     * Afficher le formulaire de création d'un établissement.
     */
    public function create()
    {
        $owners = Owner::all();
        $categories = Category::all();
        return view('back.pages.admin.etablishment.create', compact('owners', 'categories'));
    }

    /**
     * Enregistrer un nouvel établissement.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'owner_id' => 'required|exists:owners,id',
            'category_id' => 'required|exists:categories,id',
            'opening_hours' => 'required|json',
            'status' => 'required|in:ouvert,fermer',
            'phone_whatsapp' => 'nullable|string',
            'phone_service' => 'nullable|string',
            'website' => 'nullable|url',
            'email' => 'nullable|email|unique:etablishments,email',
            'service' => 'nullable|json',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Gestion de l'image
        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request->file('cover_image')->store('etablishments', 'public');
        }

        // Création de l'établissement
        Etablishment::create($validated);

        return redirect()->route('admin.etablishment.index')->with('success', 'Établissement créé avec succès.');
    }

    /**
     * Afficher un établissement spécifique.
     */
    public function show($id)
    {
        $etablishment = Etablishment::with('owner', 'category')->findOrFail($id);
        return view('back.pages.admin.etablishment.show', compact('etablishment'));
    }

    /**
     * Afficher le formulaire d'édition d'un établissement.
     */
    public function edit($id)
    {
        $etablishment = Etablishment::findOrFail($id);
        $owners = Owner::all();
        $categories = Category::all();
        return view('back.pages.admin.etablishment.edit', compact('etablishment', 'owners', 'categories'));
    }

    /**
     * Mettre à jour un établissement.
     */
    public function update(Request $request, $id)
    {
        $etablishment = Etablishment::findOrFail($id);

        // Validation des données
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'sometimes|required|string',
            'owner_id' => 'sometimes|required|exists:owners,id',
            'category_id' => 'sometimes|required|exists:categories,id',
            'opening_hours' => 'sometimes|required|json',
            'status' => 'sometimes|required|in:ouvert,fermer',
            'phone_whatsapp' => 'nullable|string',
            'phone_service' => 'nullable|string',
            'website' => 'nullable|url',
            'email' => 'nullable|email|unique:etablishments,email,' . $id,
            'service' => 'nullable|json',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        // Mise à jour de l'image
        if ($request->hasFile('cover_image')) {
            if ($etablishment->cover_image) {
                Storage::disk('public')->delete($etablishment->cover_image);
            }
            $validated['cover_image'] = $request->file('cover_image')->store('etablishments', 'public');
        }

        // Mise à jour des données
        $etablishment->update($validated);

        return redirect()->route('admin.etablishment.index')->with('success', 'Établissement mis à jour avec succès.');
    }

    /**
     * Supprimer un établissement.
     */
    public function destroy($id)
    {
        $etablishment = Etablishment::findOrFail($id);

        if ($etablishment->cover_image) {
            Storage::disk('public')->delete($etablishment->cover_image);
        }

        $deleted = $etablishment->delete();

        if ($deleted) {
            return redirect()->route('admin.etablishment.index')->with('success', 'Établissement supprimé avec succès.');
        } else {
            return redirect()->route('admin.etablishment.index')->with('fail', 'Une erreur s\'est produite lors de la suppression.');
        }
    }
}
