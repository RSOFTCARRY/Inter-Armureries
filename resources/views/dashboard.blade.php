@extends('layouts.app')

@section('sidebar')
    <nav class="space-y-2 text-sm">
        <a href="{{ route('dashboard') }}" class="block py-1 hover:underline">Tableau de bord</a>
        <a href="{{ route('favorites.index') }}" class="block py-1 hover:underline">Mes Favoris</a>
        <a href="{{ route('cart.index') }}" class="block py-1 hover:underline">Mon Panier</a>
        {{-- Ajoute ici d'autres liens si besoin --}}
    </nav>
@endsection

<!-- Bouton pour ouvrir la modale -->
<button type="button" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4" data-bs-toggle="modal" data-bs-target="#ficheUserModal">
    📝 Compléter / Mettre à jour ma fiche
</button>


@section('content')
<div class="max-w-4xl mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Bienvenue, {{ Auth::user()->name }} !</h1>

    <div class="bg-white p-6 rounded shadow-md border border-gray-200">
        <h2 class="text-xl font-semibold mb-4">Informations de votre compte professionnel :</h2>

        <ul class="list-disc list-inside space-y-2 text-gray-700">
            <li><strong>Nom :</strong> {{ Auth::user()->name }}</li>
            <li><strong>Email :</strong> {{ Auth::user()->email }}</li>
            <li><strong>Numéro SIRET :</strong> {{ Auth::user()->siret ?? 'Non renseigné' }}</li>
            <li><strong>Numéro SIA :</strong> {{ Auth::user()->sia ?? 'Non renseigné' }}</li>
        </ul>
    </div>
</div>
@endsection

<!-- Bouton pour ouvrir la modale -->
<button type="button" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4" data-bs-toggle="modal" data-bs-target="#ficheUserModal">
    📝 Compléter / Mettre à jour ma fiche
</button>


@section('pubs')
    {{-- Tu peux afficher ici des encarts publicitaires ou promos --}}
    <div class="bg-gray-100 p-4 rounded shadow-sm text-sm">
        <p><strong>Promo spéciale :</strong><br> -15% sur les holsters ce mois-ci !</p>
    </div>
@endsection
