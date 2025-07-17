{{-- resources/views/components/sidebar-blanche.blade.php --}}
<div class="w-full max-w-[240px] bg-white text-black p-4 border border-gray-300 rounded">
    <h2 class="text-lg font-bold mb-4">🔍 Filtres</h2>

    <form method="GET" action="{{ url()->current() }}" class="space-y-4">

        {{-- Filtre par catégorie --}}
        <div>
            <label for="categorie" class="block text-sm font-medium">Catégorie</label>
            <select name="categorie" id="categorie" class="w-full mt-1 p-2 border border-gray-300 rounded">
                <option value="">Toutes les catégories</option>
                @foreach ($categories ?? [] as $categorie)
                    <option value="{{ $categorie->id }}" {{ request('categorie') == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Filtre par prix minimum --}}
        <div>
            <label for="prix_min" class="block text-sm font-medium">Prix minimum (€)</label>
            <input type="number" name="prix_min" id="prix_min" min="0" step="0.01"
                   value="{{ request('prix_min') }}"
                   class="w-full mt-1 p-2 border border-gray-300 rounded">
        </div>

        {{-- Filtre par prix maximum --}}
        <div>
            <label for="prix_max" class="block text-sm font-medium">Prix maximum (€)</label>
            <input type="number" name="prix_max" id="prix_max" min="0" step="0.01"
                   value="{{ request('prix_max') }}"
                   class="w-full mt-1 p-2 border border-gray-300 rounded">
        </div>

        {{-- Tri par prix --}}
        <div>
            <label for="tri_prix" class="block text-sm font-medium">Trier par prix</label>
            <select name="tri_prix" id="tri_prix" class="w-full mt-1 p-2 border border-gray-300 rounded">
                <option value="">-- Aucun tri --</option>
                <option value="asc" {{ request('tri_prix') === 'asc' ? 'selected' : '' }}>Prix croissant</option>
                <option value="desc" {{ request('tri_prix') === 'desc' ? 'selected' : '' }}>Prix décroissant</option>
            </select>
        </div>

        {{-- Bouton pour appliquer les filtres --}}
        <button type="submit"
                class="w-full bg-green-700 text-white py-2 rounded hover:bg-green-800">
            Appliquer les filtres
        </button>
    </form>
</div>
