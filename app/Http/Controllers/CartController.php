<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        // On récupère l'article depuis la base
        $article = Article::findOrFail($id);

        // On récupère le panier actuel depuis la session, ou tableau vide
        $cart = session()->get('cart', []);

        // Si l'article est déjà dans le panier, on incrémente la quantité
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Sinon, on l'ajoute
            $cart[$id] = [
                'id' => $article->id,
                'nom' => $article->nom,
                'photo' => $article->photo,
                'prix' => $article->prix,
                'quantity' => 1,
            ];
        }

        // On sauvegarde le panier dans la session
        session()->put('cart', $cart);

        // On peut rediriger ou afficher un message
        return back()->with('success', 'Article ajouté au panier.');
    }
}
