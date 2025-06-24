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
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->nom }}" class="w-full h-40 object-contain">
                <h2 class="font-bold mt-2">{{ $article->nom }}</h2>
                <p class="text-sm bg-gray-100 p-2 rounded mt-1">
                    {{ $article->description }}
                </p>
            </div>
        @endforeach
    </div>
@endsection
