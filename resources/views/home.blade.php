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
            <div class="bg-white shadow p-2 rounded border border-gray-200">
                
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
