{{-- Filtres dans la sidebar blanche --}}
<div class="w-full max-w-xs bg-white text-black p-4 border border-black rounded">
    <h2 class="text-lg font-bold mb-4">Filtrer les favoris</h2>

    <form method="GET" action="{{ route('favorites.index') }}" class="space-y-3">

        <!-- Catégorie -->
        <div>
            <label for="categorie" class="block text-sm font-medium mb-1">Catégorie</label>
            <select name="categorie" id="categorie" class="w-full border border-black rounded px-2 py-1">
                <option value="">Toutes</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ request('categorie') == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Prix minimum -->
        <div>
            <label for="prix_min" class="block text-sm font-medium mb-1">Prix min (€)</label>
            <input type="number" name="prix_min" id="prix_min" value="{{ request('prix_min') }}"
                   class="w-full border border-black rounded px-2 py-1">
        </div>

        <!-- Prix maximum -->
        <div>
            <label for="prix_max" class="block text-sm font-medium mb-1">Prix max (€)</label>
            <input type="number" name="prix_max" id="prix_max" value="{{ request('prix_max') }}"
                   class="w-full border border-black rounded px-2 py-1">
        </div>

        <!-- Tri par prix -->
        <div>
            <label for="tri_prix" class="block text-sm font-medium mb-1">Trier par prix</label>
            <select name="tri_prix" id="tri_prix" class="w-full border border-black rounded px-2 py-1">
                <option value="">--</option>
                <option value="asc" {{ request('tri_prix') === 'asc' ? 'selected' : '' }}>Croissant</option>
                <option value="desc" {{ request('tri_prix') === 'desc' ? 'selected' : '' }}>Décroissant</option>
            </select>
        </div>

        <!-- Bouton -->
        <div class="pt-2">
            <button type="submit" class="w-full bg-green-700 text-white py-2 rounded hover:bg-green-800">
                Appliquer les filtres
            </button>
        </div>
    </form>
</div>
