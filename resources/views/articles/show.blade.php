@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white shadow rounded p-6 border border-gray-200">
        {{-- Image --}}
        <div class="text-center">
            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->nom }}" class="w-full max-h-96 object-contain mx-auto">
        </div>

        {{-- Titre + Prix --}}
        <h1 class="text-2xl font-bold mt-4">{{ $article->nom }}</h1>
        <p class="text-lg text-gray-700 mt-1">Prix : <span class="font-semibold">{{ number_format($article->prix, 2, ',', ' ') }} €</span></p>

        {{-- Description --}}
        <div class="mt-4 bg-gray-100 p-4 rounded text-gray-800">
            {{ $article->description }}
        </div>

        {{-- Bouton Ajouter au panier --}}
        <form action="{{ route('cart.add', $article->id) }}" method="POST" class="mt-6">
            @csrf
            <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">
                Ajouter au panier
            </button>
        </form>

        {{-- Bouton retour --}}
        <div class="mt-4">
            <a href="{{ url()->previous() }}" class="text-sm text-gray-600 hover:underline">← Retour à la liste</a>
        </div>
    </div>
@endsection
