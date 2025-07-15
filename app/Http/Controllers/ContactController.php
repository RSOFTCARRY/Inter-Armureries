<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Affiche le formulaire de contact
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Enregistre les données du formulaire de contact
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'     => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'sujet'   => 'required|string|max:255',
            'message' => 'required|string',
            'fichier' => 'nullable|file|max:2048', // max 2Mo
        ]);

        // Gestion de l’upload s’il y a un fichier
        if ($request->hasFile('fichier')) {
            $path = $request->file('fichier')->store('contacts_fichiers', 'public');
            $validated['fichier_path'] = $path;
        }

        Contact::create($validated);

        return redirect()->back()->with('success', 'Votre message a bien été envoyé.');
    }
}
