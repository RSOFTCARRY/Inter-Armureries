@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white shadow rounded">
        <h1 class="text-2xl font-bold mb-4">Formulaire de contact</h1>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="nom" class="block font-semibold mb-1">Nom :</label>
                <input type="text" name="nom" id="nom" class="w-full border px-3 py-2 rounded" value="{{ old('nom') }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block font-semibold mb-1">Email :</label>
                <input type="email" name="email" id="email" class="w-full border px-3 py-2 rounded" value="{{ old('email') }}" required>
            </div>

            <div class="mb-4">
                <label for="sujet" class="block font-semibold mb-1">Sujet :</label>
                <input type="text" name="sujet" id="sujet" class="w-full border px-3 py-2 rounded" value="{{ old('sujet') }}" required>
            </div>

            <div class="mb-4">
                <label for="message" class="block font-semibold mb-1">Message :</label>
                <textarea name="message" id="message" rows="5" class="w-full border px-3 py-2 rounded" required>{{ old('message') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="fichier" class="block font-semibold mb-1">Fichier (optionnel) :</label>
                <input type="file" name="fichier" id="fichier" class="w-full">
            </div>

            <div>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Envoyer
                </button>
            </div>
        </form>
    </div>
@endsection
