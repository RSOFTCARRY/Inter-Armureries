@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white shadow rounded p-6 border border-gray-200">

        {{-- 📷 Image principale --}}
        <div class="text-center">
            <img src="{{ asset('storage/' . $article->image) }}" 
                 alt="Image de {{ $article->nom }}" 
                 class="w-full max-h-96 object-contain mx-auto">
        </div>

        {{-- 🏷️ Titre + Prix --}}
        <h1 class="text-2xl font-bold mt-4">{{ $article->nom }}</h1>
        <p class="text-lg text-gray-700 mt-1">
            Prix : <span class="font-semibold">{{ number_format($article->prix, 2, ',', ' ') }} €</span>
        </p>

        {{-- 📝 Description --}}
        <div class="mt-4 bg-gray-100 p-4 rounded text-gray-800">
            {{ $article->description }}
        </div>

        {{-- 🛒 Ajouter au panier + ❤️ Favoris --}}
        <div class="flex items-center gap-6 mt-6">

            {{-- 🛒 Bouton panier --}}
            <form action="{{ route('cart.add', $article->id) }}" method="POST">
                @csrf
                <button type="submit" 
                        class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 focus:outline-none">
                    Ajouter au panier
                </button>
            </form>

            {{-- ❤️ Bouton favoris --}}
            @auth
                @php
                    $isFavori = auth()->user()->favoris->contains($article->id);
                @endphp

                <form action="{{ $isFavori ? route('favorites.destroy', $article->id) : route('favorites.store', $article->id) }}" method="POST">
                    @csrf
                    @if($isFavori)
                        @method('DELETE')
                        <button type="submit" title="Retirer des favoris" class="focus:outline-none">
                            <img src="{{ asset('images/favorieBigFull.png') }}" alt="Déjà en favori" class="w-8 h-8">
                        </button>
                    @else
                        <button type="submit" title="Ajouter aux favoris" class="focus:outline-none">
                            <img src="{{ asset('images/favorieBigEmpty.png') }}" alt="Ajouter en favori" class="w-8 h-8">
                        </button>
                    @endif
                </form>
            @else
                <a href="{{ route('login') }}" class="text-blue-600 underline text-sm">
                    Connectez-vous pour ajouter aux favoris
                </a>
            @endauth
        </div>

        {{-- 🔙 Bouton retour --}}
        <div class="mt-6">
            <a href="{{ url()->previous() ?? route('articles.index') }}" class="text-sm text-gray-600 hover:underline">
                ← Retour à la liste
            </a>
        </div>

    </div>
@endsection
