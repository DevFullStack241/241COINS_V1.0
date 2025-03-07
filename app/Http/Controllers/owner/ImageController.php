<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Models\Etablishment;
use App\Models\Etablishment_image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Afficher la liste des images d'établissements.
     */
    public function index()
    {
        $images = Etablishment_image::with('etablishment')->get();
        return view('back.pages.owner.etablishment_images.index', compact('images'));
    }

    /**
     * Afficher le formulaire d'ajout d'une image.
     */
    public function create()
    {
        $etablishments = Etablishment::all();
        return view('back.pages.owner.etablishment_images.create', compact('etablishments'));
    }

    /**
     * Enregistrer une nouvelle image.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'etablishment_id' => 'required|exists:etablishments,id',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_type' => 'required|in:menu,plat,interieur,autre',
        ]);

        // Gestion de l'upload
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('etablishment_images', 'public');
            $validated['image_url'] = $imagePath;
        }

        Etablishment_image::create($validated);

        return redirect()->route('owner.etablishment_images.index')->with('success', 'Image ajoutée avec succès.');
    }

    /**
     * Afficher une image spécifique.
     */
    public function show($id)
    {
        $image = Etablishment_image::with('etablishment')->findOrFail($id);
        return view('back.pages.owner.etablishment_images.show', compact('image'));
    }

    /**
     * Afficher le formulaire de modification d'une image.
     */
    public function edit($id)
    {
        $image = Etablishment_image::findOrFail($id);
        $etablishments = Etablishment::all();
        return view('back.pages.owner.etablishment_images.edit', compact('image', 'etablishments'));
    }

    /**
     * Mettre à jour une image.
     */
    public function update(Request $request, $id)
    {
        $image = Etablishment_image::findOrFail($id);

        $validated = $request->validate([
            'etablishment_id' => 'required|exists:etablishments,id',
            'image_type' => 'required|in:menu,plat,interieur,autre',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gestion de l'upload si une nouvelle image est fournie
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('etablishment_images', 'public');
            $validated['image_url'] = $imagePath;
        }

        $image->update($validated);

        return redirect()->route('owner.etablishment_images.index')->with('success', 'Image mise à jour avec succès.');
    }

    /**
     * Supprimer une image.
     */
    public function destroy($id)
    {
        $image = Etablishment_image::findOrFail($id);
        $image->delete();

        return redirect()->route('owner.etablishment_images.index')->with('success', 'Image supprimée avec succès.');
    }
}