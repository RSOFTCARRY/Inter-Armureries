<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inter Armureries</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-black">

    <!-- Bandeau Vert -->
    <div class="w-full bg-[#0D5037] text-white px-4 py-2 flex items-center justify-between flex-wrap">
        <div class="w-full md:w-1/3 text-sm md:text-base">
            <p>Bienvenue sur Inter Armureries</p>
        </div>
        <div class="w-full md:w-1/3 text-center overflow-hidden">
            <div class="whitespace-nowrap animate-marquee">
                <span class="inline-block px-4">Plateforme réservée aux professionnels. Échangez vos invendus. Offres limitées !</span>
            </div>
        </div>
        <div class="w-full md:w-1/3 text-right pr-2">
            <span class="inline-block w-3 h-3 rounded-full bg-red-600 animate-pulse"></span>
        </div>
    </div>

    <!-- Navbar Noire -->
    <nav class="w-full bg-black text-white px-4 py-2 flex flex-wrap items-center justify-between">
        <div class="flex items-center space-x-2">
            <img src="{{ asset('logo.png') }}" alt="Logo Inter Armureries" class="h-8">
            <span class="font-bold text-lg">Inter Armureries</span>
        </div>

        <div class="flex items-center space-x-4">
            @guest
                <a href="{{ route('login') }}" class="hover:underline">Connexion</a>
                <a href="{{ route('register') }}" class="hover:underline">S'enregistrer</a>
            @endguest

            @auth
                <a href="{{ route('favorites.index') }}" class="text-white hover:underline flex items-center">
                    <img src="{{ asset('images/favorieBigFull.png') }}" alt="Favoris" class="w-6 h-6 mr-1">
                    Mes Favoris
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:underline">Déconnexion</button>
                </form>
            @endauth
        </div>
    </nav>

    <!-- Structure principale -->
    <div class="flex w-full min-h-screen">

        <!-- Colonne gauche -->
        <aside class="w-[280px] bg-white p-4 flex justify-center items-start">
            <div class="w-full max-w-[240px] bg-black text-white p-4 rounded">
                @yield('sidebar')
            </div>
        </aside>

        <!-- Colonne centrale -->
        <main class="flex-auto px-4 py-6">
            @yield('content')
        </main>

        <!-- Colonne droite -->
        <aside class="w-[280px] bg-white p-4">
            @yield('pubs')
        </aside>
    </div>

    <!-- Footer -->
    <div class="flex">
        <div class="w-[280px]"></div> <!-- espace gauche -->

        <footer class="flex-auto bg-black text-white text-sm mt-4 px-4">
            <div class="text-center py-2">
                © 2025 <strong>Inter Armureries®</strong>. Tous droits réservés.
            </div>
            <div class="flex justify-center space-x-4 py-2">
                <a href="#" class="hover:underline">CGU</a>
                <a href="#" class="hover:underline">Règlement</a>
                <a href="#" class="hover:underline">Politique de protection</a>
                <a href="#" class="hover:underline">À propos</a>
                <a href="#" class="hover:underline">Contact</a>
            </div>
        </footer>

        <div class="w-[280px]"></div> <!-- espace droit -->
    </div>

    <!-- Animation défilement -->
    <style>
        @keyframes marquee {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }
        .animate-marquee {
            display: inline-block;
            white-space: nowrap;
            animation: marquee 15s linear infinite;
        }
    </style>
</body>
</html>
