<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; // ✅ C'EST CETTE LIGNE QUI MANQUE SOUVENT

class DashboardController extends Controller
{
    public function __construct()
    {
        // Assure que seul un utilisateur connecté peut accéder au dashboard
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('dashboard', [
            'user' => $user
        ]);
    }
}
