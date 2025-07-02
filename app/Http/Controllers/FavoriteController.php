<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class FavoriteController extends Controller
{
    // Affiche la liste des articles favoris de l'utilisateur connecté
    public function index()
    {
        $user = Auth::user();

        // Récupère les articles favoris liés à l'utilisateur via la relation favoris
        $articles = $user->favoris()->get();

        return view('favorites.index', compact('articles'));
    }

    // Ajoute un article aux favoris
    public function store($articleId)
    {
        $user = Auth::user();

        // Vérifie si l'article n'est pas déjà en favoris pour éviter les doublons
        if (!$user->favoris()->where('article_id', $articleId)->exists()) {
            $user->favoris()->attach($articleId);
        }

        return redirect()->back()->with('success', 'Article ajouté aux favoris');
    }

    // Retire un article des favoris
    public function destroy($articleId)
    {
        $user = Auth::user();

        $user->favoris()->detach($articleId);

        return redirect()->back()->with('success', 'Article retiré des favoris');
    }
}
