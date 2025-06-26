@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-white">
    <div class="w-full max-w-md p-8 border border-gray-200 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Inscription</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium">Nom</label>
                <input type="text" name="name" value="{{ old('name') }}" required class="w-full mt-1 p-2 border rounded" />
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required class="w-full mt-1 p-2 border rounded" />
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Numéro de SIRET</label>
                <input type="text" name="siret" value="{{ old('siret') }}" required class="w-full mt-1 p-2 border rounded" />
                @error('siret')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Champ SIA modifiable à l'inscription -->
            <div class="mb-4">
                <label class="block text-sm font-medium">SIA</label>
                <input type="text" name="sia" value="{{ old('sia') }}" required class="w-full mt-1 p-2 border rounded" />
                @error('sia')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Mot de passe</label>
                <input type="password" name="password" required class="w-full mt-1 p-2 border rounded" />
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" required class="w-full mt-1 p-2 border rounded" />
            </div>

            <button type="submit" class="w-full bg-green-700 text-white py-2 rounded hover:bg-green-800 transition">
                S'inscrire
            </button>
        </form>
    </div>
</div>
@endsection
