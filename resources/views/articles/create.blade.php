@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">Ajouter un article</h1>

    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block">Nom :</label>
            <input type="text" name="nom" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block">Description :</label>
            <textarea name="description" class="w-full border p-2 rounded" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block">Prix (€) :</label>
            <input type="number" name="prix" step="0.01" class="w-full border p-2 rounded" required>
        </div>


        <div class="mb-4">
            <label class="block">Image (optionnelle) :</label>
            <input type="file" name="image" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-black text-white px-4 py-2 rounded">Ajouter</button>
    </form>
</div>
@endsection
