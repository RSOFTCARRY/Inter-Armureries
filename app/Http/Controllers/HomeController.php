<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->take(9)->get(); // ou tous si tu préfères
        return view('home', compact('articles'));
    }
}
