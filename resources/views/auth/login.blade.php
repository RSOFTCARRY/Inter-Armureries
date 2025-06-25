@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-white">
    <div class="w-full max-w-md p-8 border border-gray-200 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Connexion</h2>

        @if(session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium">Adresse email</label>
                <input type="email" name="email" required class="w-full mt-1 p-2 border rounded" />
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium">Mot de passe</label>
                <input type="password" name="password" required class="w-full mt-1 p-2 border rounded" />
            </div>

            <button type="submit" class="w-full bg-black text-white p-2 rounded hover:bg-gray-800">
                Se connecter
            </button>
        </form>

        <p class="mt-4 text-sm text-center">
            Pas encore de compte ?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Créer un compte</a>
        </p>
    </div>
</div>
@endsection
