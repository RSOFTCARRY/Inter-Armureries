@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Mes favoris</h1>

    @if($articles->isEmpty())
        <p>Vous n'avez aucun article en favoris.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($articles as $article)
                <div class="bg-white shadow p-2 rounded border border-gray-200">
                    <a href="{{ route('articles.show', $article->id) }}">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->nom }}" class="w-full h-40 object-contain">
                    </a>

                    <a href="{{ route('articles.show', $article->id) }}">
                        <h2 class="font-bold mt-2 hover:underline">{{ $article->nom }}</h2>
                    </a>

                    <p class="text-sm bg-gray-100 p-2 rounded mt-1 text-gray-800">{{ $article->description }}</p>

                    {{-- Bouton pour retirer des favoris --}}
                    <form action="{{ route('favorites.destroy', $article->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm">
                            Retirer des favoris
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
@endsection
