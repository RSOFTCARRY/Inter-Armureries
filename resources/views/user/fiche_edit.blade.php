@if(auth()->user()->raison_sociale)
    <p><strong>Nom de l’entreprise :</strong> {{ auth()->user()->raison_sociale }}</p>
@else
    <p><strong>Nom de l’entreprise :</strong> Non renseigné</p>
@endif

<form action="{{ route('user.fiche.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Email -->
    <div>
        <label for="email">Email *</label>
        <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required>
        @error('email')<div>{{ $message }}</div>@enderror
    </div>

    <!-- Raison sociale -->
    <div>
        <label for="raison_sociale">Raison sociale</label>
        <input type="text" name="raison_sociale" id="raison_sociale" value="{{ old('raison_sociale', auth()->user()->raison_sociale) }}">
        @err
