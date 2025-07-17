<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categorie;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Récupération des filtres éventuels
        $categorie_id = $request->input('categorie');
        $tri_prix = $request->input('tri_prix'); // 'asc' ou 'desc'

        // Requête de base
        $query = Article::query();

        // Filtrage par catégorie
        if ($categorie_id) {
            $query->where('categorie_id', $categorie_id);
        }

        // Tri par prix
        if ($tri_prix === 'asc' || $tri_prix === 'desc') {
            $query->orderBy('prix', $tri_prix);
        } else {
            $query->latest(); // par défaut, les plus récents
        }

        $articles = $query->take(9)->get(); // à adapter selon pagination ou besoins

        // Récupération des catégories pour la liste déroulante
        $categories = Categorie::orderBy('nom')->get();

        // Envoi à la vue avec les valeurs de filtres actuelles
        return view('home', compact('articles', 'categories', 'categorie_id', 'tri_prix'));
    }

    public function cgu()
    {
        return view('pages.cgu');
    }
}
