<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class FavoriteController extends Controller
{
    // Affiche la liste des favoris de l'utilisateur connecté
    public function index()
    {
        $user = Auth::user();
        $favorites = $user->favoris()->with('favoris')->get();
        // On récupère les articles favoris
        $articles = $user->favoris()->get();

        return view('favorites.index', compact('articles'));
    }

    // Ajoute un article aux favoris
    public function store($id)
    {
        $user = Auth::user();

        if (!$user->favoris()->where('article_id', $id)->exists()) {
            $user->favoris()->attach($id);
        }

        return redirect()->back()->with('success', 'Article ajouté aux favoris');
    }

    // Retire un article des favoris
    public function destroy($id)
    {
        $user = Auth::user();

        $user->favoris()->detach($id);

        return redirect()->back()->with('success', 'Article retiré des favoris');
    }
}
