<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Etablishment;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    /**
     * Ajouter un commentaire (seuls les clients peuvent le faire).
     */
    public function store(Request $request, $etablishment_id)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        // Vérifie si l'utilisateur est un client connecté
        if (auth()->guard('client')->check()) {
            Comment::create([
                'content' => $request->content,
                'client_id' => auth()->guard('client')->id(),
                'etablishment_id' => $etablishment_id
            ]);

            return back()->with('success', 'Commentaire ajouté avec succès.');
        }

        return back()->with('error', 'Seuls les clients peuvent commenter.');
    }

    /**
     * Répondre à un commentaire (seuls les propriétaires de l'établissement peuvent répondre).
     */
    public function reply(Request $request, $comment_id)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        $comment = Comment::findOrFail($comment_id);
        $etablishment = Etablishment::findOrFail($comment->etablishment_id);

        // Vérifie si l'utilisateur est un propriétaire et s'il possède l'établissement
        if (auth()->guard('owner')->check() && auth()->guard('owner')->id() == $etablishment->owner_id) {
            Comment::create([
                'content' => $request->content,
                'owner_id' => auth()->guard('owner')->id(),
                'etablishment_id' => $comment->etablishment_id,
                'parent_id' => $comment->id
            ]);

            return back()->with('success', 'Réponse envoyée.');
        }

        return back()->with('error', 'Vous ne pouvez répondre qu’aux commentaires de vos établissements.');
    }
}
