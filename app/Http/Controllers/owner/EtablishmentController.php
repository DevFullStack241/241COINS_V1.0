<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Etablishment;
use App\Models\Category;
use App\Models\EtablishmentImage;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
    /**
     * Enregistrer un nouvel établissement avec plusieurs images.
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
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Création de l'établissement
        $etablishment = new Etablishment();
        $etablishment->fill($request->all());
        $etablishment->owner_id = auth()->id();

        // Gestion de l'image de couverture
        if ($request->hasFile('cover_image')) {
            $etablishment->cover_image = $request->file('cover_image')->store('etablishments', 'public');
        }

        $etablishment->save();

        // Gestion des images supplémentaires
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('etablishments/images', 'public');
                EtablishmentImage::create([
                    'etablishment_id' => $etablishment->id,
                    'image_path' => $path,
                ]);
            }
        }

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
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'address' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|in:ouvert,fermer',
            'email' => 'nullable|email|unique:etablishments,email,' . $id,
            'phone_whatsapp' => 'nullable|string',
            'phone_service' => 'nullable|string',
            'website' => 'nullable|url',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'opening_hours' => 'nullable|string',
            'services' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Trouver l'établissement
        $etablishment = Etablishment::findOrFail($id);
        $etablishment->update($request->except(['cover_image', 'images']));

        // Gestion de l'image de couverture
        if ($request->hasFile('cover_image')) {
            // Supprimer l'ancienne image si elle existe
            if ($etablishment->cover_image) {
                Storage::disk('public')->delete($etablishment->cover_image);
            }
            // Sauvegarder la nouvelle image
            $etablishment->cover_image = $request->file('cover_image')->store('etablishments', 'public');
        }

        $etablishment->save();

        // Gestion des images supplémentaires
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('etablishments/images', 'public');
                EtablishmentImage::create([
                    'etablishment_id' => $etablishment->id,
                    'image_path' => $path,
                ]);
            }
        }

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
