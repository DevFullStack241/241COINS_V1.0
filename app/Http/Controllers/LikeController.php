<?php

namespace App\Http\Controllers;

use App\Models\Etablishment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggleLike(Request $request, $etablishmentId)
    {
        // Vérifier si l'utilisateur est bien un client authentifié
        if (!Auth::guard('client')->check()) {
            return redirect()->back()->with('error', 'Seuls les clients authentifiés peuvent liker.');
        }

        $clientId = Auth::guard('client')->id();
        $type = $request->input('type'); // 'like' ou 'dislike'

        // Vérifier si l'établissement existe
        $etablishment = Etablishment::findOrFail($etablishmentId);

        // Vérifier si l'utilisateur a déjà liké ou disliké cet établissement
        $existingLike = Like::where('client_id', $clientId)
            ->where('etablishment_id', $etablishmentId)
            ->first();

        if ($existingLike) {
            if ($existingLike->type === $type) {
                // Si le même type est sélectionné, annuler le like/dislike
                $existingLike->delete();
                return redirect()->back()->with('success', 'Votre réaction a été supprimée.');
            } else {
                // Sinon, mettre à jour le type (like ↔ dislike)
                $existingLike->update(['type' => $type]);
                return redirect()->back()->with('success', 'Votre réaction a été mise à jour.');
            }
        }

        // Si aucune réaction n'existe, on en crée une
        Like::create([
            'client_id' => $clientId,
            'etablishment_id' => $etablishmentId,
            'type' => $type,
        ]);

        return redirect()->back()->with('success', 'Votre réaction a été enregistrée.');
    }
}
