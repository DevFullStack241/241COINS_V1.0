<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OwnerController extends Controller
{
    /**
     * Afficher la liste des propriétaires.
     */
    public function index()
    {
        $owners = Owner::all();
        return view('back.pages.admin.owner.index', compact('owners'));
    }

    /**
     * Afficher les détails d'un propriétaire.
     */
    public function show($id)
    {
        $owner = Owner::findOrFail($id);
        return view('back.pages.admin.owner.show', compact('owner'));
    }

    /**
     * Supprimer un propriétaire.
     */
    public function destroy($id)
    {
        $owner = Owner::findOrFail($id);

        // Supprimer l'image associée si elle existe
        if ($owner->picture) {
            Storage::disk('public')->delete($owner->picture);
        }

        $owner->delete();

        return redirect()->route('admin.owner.index')->with('success', 'Propriétaire supprimé avec succès.');
    }
}
