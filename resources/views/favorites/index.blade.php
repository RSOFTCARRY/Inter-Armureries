@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Mes Articles Favoris</h1>

    @if($articles->isEmpty())
        <p>Vous n'avez aucun article en favoris.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($articles as $article)
                <div class="bg-white shadow p-4 rounded border border-gray-200">
                    {{-- Lien vers la fiche article --}}
                    <a href="{{ route('articles.show', $article->id) }}">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->nom }}" class="w-full h-40 object-contain">
                        <h2 class="font-bold mt-2 hover:underline">{{ $article->nom }}</h2>
                    </a>

                    {{-- Description --}}
                    <p class="text-sm bg-gray-100 p-2 rounded mt-1 text-gray-800">{{ $article->description }}</p>

                    {{-- Prix --}}
                    <p class="text-green-700 font-semibold mt-1">{{ number_format($article->prix, 2, ',', ' ') }} €</p>

                    {{-- Bouton Retirer des favoris --}}
                    <form action="{{ route('favorites.destroy', $article->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm w-full">
                            Retirer des favoris
                        </button>
                    </form>

                    {{-- Bouton Ajouter au panier avec icône --}}
                    <form action="{{ route('cart.add', $article->id) }}" method="POST" class="mt-2">
                        @csrf
                        <button class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm w-full flex items-center justify-center gap-2">
                            🛒 Mettre au panier
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
@endsection
