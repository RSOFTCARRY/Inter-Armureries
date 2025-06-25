@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-white">
    <div class="w-full max-w-md p-8 border border-gray-200 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Inscription</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium">Nom</label>
                <input type="text" name="name" required class="w-full mt-1 p-2 border rounded" />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" required class="w-full mt-1 p-2 border rounded" />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Mot de passe</label>
                <input type="password" name="password" required class="w-full mt-1 p-2 border rounded" />
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" required class="w-full mt-1 p-2 border rounded" />
            </div>

            <button type="submit" class="w-full bg-black text-white p-2 rounded hover:bg-gray-800">
                S'inscrire
            </button>
        </form>

        <p class="mt-4 text-sm text-center">
            Déjà inscrit ?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Se connecter</a>
        </p>
    </div>
</div>
@endsection
