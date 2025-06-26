@extends('layouts.app')

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
