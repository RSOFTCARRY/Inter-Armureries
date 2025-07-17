<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Categorie;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        // Récupération des filtres de la requête
        $categorieId = $request->input('categorie');
        $prixMin = $request->input('prix_min');
        $prixMax = $request->input('prix_max');
        $triPrix = $request->input('tri_prix');

        // On récupère tous les favoris de l'utilisateur (base de départ)
        $query = $user->favoris();

        // Appliquer les filtres si présents
        if ($categorieId) {
            $query->where('categorie_id', $categorieId);
        }

        if ($prixMin !== null) {
            $query->where('prix', '>=', $prixMin);
        }

        if ($prixMax !== null) {
            $query->where('prix', '<=', $prixMax);
        }

        // Appliquer le tri si spécifié
        if ($triPrix === 'asc') {
            $query->orderBy('prix', 'asc');
        } elseif ($triPrix === 'desc') {
            $query->orderBy('prix', 'desc');
        }

        // Récupérer les articles filtrés
        $articles = $query->get();

        // Récupérer toutes les catégories pour l'affichage du filtre
        $categories = Categorie::all();

        return view('favorites.index', compact('articles', 'categories'));
    }

    public function store($articleId)
    {
        $user = Auth::user();

        if (!$user->favoris()->where('article_id', $articleId)->exists()) {
            $user->favoris()->attach($articleId);
        }

        return redirect()->back()->with('success', 'Article ajouté aux favoris');
    }

    public function destroy($articleId)
    {
        $user = Auth::user();
        $user->favoris()->detach($articleId);

        return redirect()->back()->with('success', 'Article retiré des favoris');
    }
}
