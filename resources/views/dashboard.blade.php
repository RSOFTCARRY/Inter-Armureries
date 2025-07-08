@extends('layouts.app')

@section('sidebar')
    <nav class="space-y-2 text-sm">
        <a href="{{ route('dashboard') }}" class="block py-1 hover:underline">Tableau de bord</a>
        <a href="{{ route('favorites.index') }}" class="block py-1 hover:underline">Mes Favoris</a>
        <a href="{{ route('cart.index') }}" class="block py-1 hover:underline">Mon Panier</a>
    </nav>
@endsection

@section('content')
<div class="max-w-4xl mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Bienvenue, {{ Auth::user()->user ?? Auth::user()->name }} !</h1>

    <div class="bg-white p-6 rounded shadow-md border border-gray-200">
        <h2 class="text-xl font-semibold mb-4">Informations de votre compte professionnel :</h2>

        <ul class="list-disc list-inside space-y-2 text-gray-700 mb-4">
            <li><strong>Nom de l'entreprise:</strong> {{ Auth::user()->name }}</li>
            <li><strong>Email :</strong> {{ Auth::user()->email }}</li>
            <li><strong>Numéro SIRET :</strong> {{ Auth::user()->siret ?? 'Non renseigné' }}</li>
            <li><strong>Numéro SIA :</strong> {{ Auth::user()->sia ?? 'Non renseigné' }}</li>
        </ul>

        <button onclick="document.getElementById('ficheModal').classList.remove('hidden')" class="bg-[#0D5037] text-white px-4 py-2 rounded hover:bg-green-700">
            Compléter ma fiche utilisateur
        </button>
    </div>
</div>
@endsection

@section('pubs')
<div class="bg-gray-100 p-4 rounded shadow-sm text-sm">
    <p><strong>Promo spéciale :</strong><br> -15% sur les holsters ce mois-ci !</p>
</div>

<!-- ✅ MODALE DE FICHE UTILISATEUR -->
<div id="ficheModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div id="ficheModalContent" class="bg-white w-full max-w-3xl p-6 rounded-lg shadow-lg relative max-h-[90vh] overflow-y-auto">
        <form method="POST" action="{{ route('fiche-utilisateur.update') }}">
            @csrf

            <button type="button" onclick="closeFicheModal()" class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-xl font-bold">&times;</button>

            <h2 class="text-2xl font-semibold mb-6">Fiche utilisateur</h2>

            <!-- Partie 1 : Informations principales -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Informations principales</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Nom de l’entreprise</label>
                        <input type="text" name="raison_sociale" value="{{ Auth::user()->raison_sociale }}" readonly class="w-full border-gray-300 rounded bg-gray-100 text-gray-500">
                        <p class="text-sm text-gray-500 mt-1">Ce champ est automatiquement rempli à l'inscription.</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Email</label>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" readonly class="w-full border-gray-300 rounded bg-gray-100 text-gray-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Numéro SIRET</label>
                        <input type="text" value="{{ Auth::user()->siret }}" disabled class="w-full border-gray-300 rounded bg-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Numéro SIA</label>
                        <input type="text" value="{{ Auth::user()->sia }}" disabled class="w-full border-gray-300 rounded bg-gray-100">
                    </div>
                </div>
            </div>

            <!-- Partie 2 : Responsable & Contact -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Responsable & Contact</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Nom du responsable</label>
                        <input type="text" name="nom" value="{{ Auth::user()->nom }}" class="w-full border-gray-300 rounded">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Prénom du responsable</label>
                        <input type="text" name="prenom" value="{{ Auth::user()->prenom }}" class="w-full border-gray-300 rounded">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Téléphone fixe</label>
                        <input type="text" name="tel_fixe" value="{{ Auth::user()->tel_fixe }}" class="w-full border-gray-300 rounded">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Téléphone mobile</label>
                        <input type="text" name="tel_mobile" value="{{ Auth::user()->tel_mobile }}" class="w-full border-gray-300 rounded">
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium">Adresse du siège social</label>
                        <input type="text" name="adresse" value="{{ Auth::user()->adresse }}" class="w-full border-gray-300 rounded">
                    </div>
                </div>
            </div>

            <!-- Partie 3 : Documents -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold mb-2">Documents à fournir</h3>
                <div class="space-y-4">
                    @php
                        $docs = [
                            'autorisation_commerce' => 'Autorisation de Commerce',
                            'afci' => 'AFCI',
                            'diplome' => 'Diplôme d’armurier',
                            'agrement' => 'Agrément armurier',
                            'kbis' => 'K-Bis',
                        ];
                    @endphp

                    @foreach ($docs as $key => $label)
                        <div class="grid grid-cols-2 gap-4 items-center">
                            <div>
                                <label class="block text-sm font-medium">{{ $label }}</label>
                                @if (Auth::user()->$key)
                                    <a href="{{ asset('storage/' . Auth::user()->$key) }}" class="text-blue-600 underline" target="_blank">Voir document</a>
                                @else
                                    <span class="text-red-500">Non fourni</span>
                                @endif
                            </div>
                            <div>
                                <label class="block text-sm font-medium">Date de validité</label>
                                <input type="date" name="{{ $key }}_date" value="{{ Auth::user()->{$key . '_date'} }}" class="w-full border-gray-300 rounded">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="text-right mt-6">
                <button type="submit" class="bg-[#0D5037] text-white px-4 py-2 rounded hover:bg-green-700">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

<script>
    const ficheModal = document.getElementById('ficheModal');
    const ficheModalContent = document.getElementById('ficheModalContent');

    function closeFicheModal() {
        ficheModal.classList.add('hidden');
    }

    ficheModal.addEventListener('click', function (e) {
        if (!ficheModalContent.contains(e.target)) {
            closeFicheModal();
        }
    });
</script>
@endsection
