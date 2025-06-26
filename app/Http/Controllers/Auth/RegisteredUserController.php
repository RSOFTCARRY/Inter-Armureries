<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    /**
     * Affiche le formulaire d'inscription.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Traite l'inscription d'un nouvel utilisateur professionnel.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'siret' => ['required', 'string', 'size:14', 'unique:users,siret'], // 14 caractères stricts
            'sia' => ['required', 'string', 'max:255', 'unique:users,sia'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Création utilisateur
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'siret' => $validated['siret'],
            'sia' => $validated['sia'],
            'password' => Hash::make($validated['password']),
        ]);

        // Connexion automatique
        Auth::login($user);

        // Redirection vers dashboard
        return redirect()->route('dashboard');
    }
}
