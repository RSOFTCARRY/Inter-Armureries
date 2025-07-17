<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Categorie; // ✅ ajout de l'import du modèle Categorie

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->take(9)->get(); // ou tous si tu préfères
        $categories = Categorie::orderBy('nom')->get(); // ✅ récupération des catégories

        return view('home', compact('articles', 'categories')); // ✅ passage à la vue
    }

    public function cgu()
    {
        return view('pages.cgu');
    }
}
