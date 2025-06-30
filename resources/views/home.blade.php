@extends('layouts.app')

@section('sidebar')
    {{-- Sidebar vide ou future navigation --}}
@endsection

@section('pubs')
    {{-- Exemple de pub --}}
    <div class="bg-gray-100 p-2 rounded shadow mb-4">
        <p class="text-sm">🔫 Nouveautés à découvrir !</p>
    </div>
    <div class="bg-gray-100 p-2 rounded shadow mb-4">
        <p class="text-sm">📦 Livraison gratuite dès 500 €</p>
    </div>
@endsection

@section('content')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($articles as $article)
            <div class="bg-white shadow p-2 rounded border border-gray-200 relative">

                {{-- Bouton favoris dynamique --}}
@auth
    <div class="absolute top-2 right-2">
        @if (auth()->user()->favoris->contains($article->id))
            {{-- Déjà en favoris : bouton pour retirer --}}
            <form method="POST" action="{{ route('favorites.destroy', $article->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" title="Retirer des favoris">
                    <img src="{{ asset('icons/favorieBigFull.png') }}" alt="Retirer des favoris" class="w-6 h-6">
                </button>
            </form>
        @else
            {{-- Pas encore en favoris : bouton pour ajouter --}}
            <form method="POST" action="{{ route('favorites.store', $article->id) }}">
                @csrf
                <button type="submit" title="Ajouter aux favoris">
                    <img src="{{ asset('icons/favorieBigEmpty.png') }}" alt="Ajouter aux favoris" class="w-6 h-6">
                </button>
            </form>
        @endif
    </div>
@endauth


                {{-- Image cliquable --}}
                <a href="{{ route('articles.show', $article->id) }}">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->nom }}" class="w-full h-40 object-contain">
                </a>

                {{-- Titre cliquable --}}
                <a href="{{ route('articles.show', $article->id) }}">
                    <h2 class="font-bold mt-2 hover:underline">{{ $article->nom }}</h2>
                </a>

                {{-- Description cliquable --}}
                <a href="{{ route('articles.show', $article->id) }}">
                    <p class="text-sm bg-gray-100 p-2 rounded mt-1 hover:underline text-gray-800">
                        {{ $article->description }}
                    </p>
                </a>

                <p class="text-sm text-gray-700 mt-1">
                    Prix : <span class="font-semibold">{{ number_format($article->prix, 2, ',', ' ') }} €</span>
                </p>


                {{-- Formulaire pour ajouter au panier --}}
                <form action="{{ route('cart.add', $article->id) }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="bg-green-700 text-white px-3 py-1 rounded hover:bg-green-800 text-sm">
                        Ajouter au panier
                    </button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
