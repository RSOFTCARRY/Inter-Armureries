<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserFicheController extends Controller
{
    /**
     * Affiche le formulaire d'édition de la fiche utilisateur.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('user.fiche.edit', compact('user'));
    }

    /**
     * Met à jour les informations et documents de la fiche utilisateur.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validation des champs modifiables
        $validated = $request->validate([
            'email' => 'required|email',
            'prenom' => 'nullable|string|max:255',
            'telephone_fixe' => 'nullable|string|max:20',
            'telephone_mobile' => 'nullable|string|max:20',

            // Documents (fichiers + dates)
            'doc_autorisation' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'validite_autorisation' => 'nullable|date',
            'doc_afci' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'validite_afci' => 'nullable|date',
            'doc_diplome' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'validite_diplome' => 'nullable|date',
            'doc_agrement' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'validite_agrement' => 'nullable|date',
            'doc_kbis' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
            'validite_kbis' => 'nullable|date',
        ]);

        // Mise à jour des informations personnelles
        $user->email = $validated['email'];
        $user->prenom = $validated['prenom'] ?? null;
        $user->telephone_fixe = $validated['telephone_fixe'] ?? null;
        $user->telephone_mobile = $validated['telephone_mobile'] ?? null;

        // Liste des documents et dates associées à gérer
        $docs = [
            'doc_autorisation' => 'validite_autorisation',
            'doc_afci' => 'validite_afci',
            'doc_diplome' => 'validite_diplome',
            'doc_agrement' => 'validite_agrement',
            'doc_kbis' => 'validite_kbis',
        ];

        foreach ($docs as $docField => $dateField) {
            if ($request->hasFile($docField)) {
                // Supprimer l'ancien fichier si existant
                if ($user->$docField) {
                    Storage::disk('public')->delete($user->$docField);
                }
                // Stocker le nouveau fichier dans un dossier spécifique à l'utilisateur
                $path = $request->file($docField)->store("documents/{$user->id}", 'public');
                $user->$docField = $path;
            }

            // Mise à jour de la date associée si présente
            if (array_key_exists($dateField, $validated)) {
                $user->$dateField = $validated[$dateField];
            }
        }

        // $user->save();

        return redirect()->route('user.fiche.edit')->with('success', 'Fiche mise à jour avec succès.');
    }
}
