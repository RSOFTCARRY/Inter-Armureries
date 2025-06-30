<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inter Armureries</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-black min-h-screen flex flex-col">

    <!-- Bandeau Vert -->
    <header class="w-full bg-[#0D5037] text-white px-4 py-2 flex flex-wrap items-center justify-between">
        <div class="w-full md:w-1/3 text-sm md:text-base">
            <p>Bienvenue sur Inter Armureries</p>
        </div>
        <div class="w-full md:w-1/3 text-center overflow-hidden">
            <div class="whitespace-nowrap animate-marquee">
                <span class="inline-block px-4">
                    Plateforme réservée aux professionnels. Échangez vos invendus. Offres limitées !
                </span>
            </div>
        </div>
        <div class="w-full md:w-1/3 text-right pr-2">
            <span class="inline-block w-3 h-3 rounded-full bg-red-600 animate-pulse" title="Statut utilisateur"></span>
        </div>
    </header>

    <!-- Navbar Noire -->
    <nav class="w-full bg-black text-white px-4 py-2 flex flex-wrap items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center space-x-2 hover:opacity-80">
        <img src="{{ asset('images/logo-inter-armurerie.png') }}" alt="Logo Inter Armureries" class="h-8">
        <span class="font-bold text-lg">Inter Armureries</span>
        </a>


        <div class="flex items-center space-x-4">
            @guest
                <a href="{{ route('login') }}" class="hover:underline">Connexion</a>
                <a href="{{ route('register') }}" class="hover:underline">S'enregistrer</a>
            @endguest

            @auth

                <span class="hidden md:inline-block mr-4">
                    Bonjour, {{ Auth::user()->raison_sociale ?? Auth::user()->name }}
                </span>
                <a href="{{ route('favorites.index') }}" class="hover:underline flex items-center">
                    <img src="{{ asset('icons/favorieBigFull.png') }}" alt="Favoris" class="w-6 h-6 mr-1">
                    Mes Favoris
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:underline">Déconnexion</button>
                </form>
            @endauth

            
        </div>
    </nav>

    <!-- Corps de page -->
    <div class="flex flex-grow w-full">

        <!-- Colonne gauche (Sidebar) -->
        <aside class="w-[280px] bg-white p-4 flex justify-center">
            <div class="w-full max-w-[240px] bg-black text-white p-4 rounded">
                @yield('sidebar')
            </div>
        </aside>

        <!-- Colonne centrale -->
        <main class="flex-auto px-4 py-6">
            @yield('content')
        </main>

        <!-- Colonne droite (Pubs) -->
        <aside class="w-[280px] bg-white p-4">
            @yield('pubs')
        </aside>
    </div>

    <!-- Footer -->
    <footer class="w-full bg-black text-white text-sm mt-4 px-4 py-4">
        <div class="text-center py-2">
            © 2025 <strong>Inter Armureries®</strong>. Tous droits réservés.
        </div>
        <div class="flex flex-wrap justify-center gap-4 py-2">
            <a href="#" class="hover:underline">CGU</a>
            <a href="#" class="hover:underline">Règlement</a>
            <a href="#" class="hover:underline">Politique de protection</a>
            <a href="#" class="hover:underline">À propos</a>
            <a href="#" class="hover:underline">Contact</a>
        </div>
    </footer>

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
