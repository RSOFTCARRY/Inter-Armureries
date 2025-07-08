<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FicheUtilisateurController extends Controller
{
    /**
     * Affiche le formulaire d'édition de la fiche utilisateur.
     */
    public function edit()
    {
        $user = Auth::user(); // Utilisateur actuellement connecté
        return view('user.fiche_edit', compact('user'));
    }

    /**
     * Met à jour la fiche utilisateur avec les données du formulaire.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Valider les champs modifiables (ajuste ici selon tes besoins)
        $validated = $request->validate([
            'raison_sociale' => 'nullable|string|max:255',
            'nom' => 'nullable|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'adresse' => 'nullable|string|max:255',
            // Ajoute ici d'autres validations si besoin
        ]);

        // Mise à jour des champs dans la base
        $user->update($validated);

        return redirect()->back()->with('success', 'Votre fiche a bien été mise à jour.');
    }
}
