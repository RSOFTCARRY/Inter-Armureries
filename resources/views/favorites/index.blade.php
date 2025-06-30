@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Mon Panier</h1>

    @if(empty($cart))
        <p>Votre panier est vide.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($articles as $article)
                <div class="bg-white shadow p-2 rounded border border-gray-200">
                    <a href="{{ route('articles.show', $article->id) }}">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->nom }}" class="w-full h-40 object-contain">
                        <h2 class="font-bold mt-2 hover:underline">{{ $article->nom }}</h2>
                    </a>

                    <p class="text-sm bg-gray-100 p-2 rounded mt-1 text-gray-800">{{ $article->description }}</p>
                    <p class="text-green-700 font-semibold mt-1">{{ number_format($article->prix, 2, ',', ' ') }} €</p>
                    <p class="text-sm text-gray-500">Quantité : {{ $cart[$article->id] }}</p>

                    <form action="{{ route('cart.remove', $article->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-sm">
                            Retirer
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <form action="{{ route('cart.clear') }}" method="POST" class="mt-6">
            @csrf
            @method('DELETE')
            <button class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">
                Vider le panier
            </button>
        </form>
    @endif
@endsection
