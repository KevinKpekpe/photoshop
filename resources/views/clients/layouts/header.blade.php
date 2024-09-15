<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhotoShop - Votre Destination pour l'Équipement Photographique</title>
    <link rel="icon" href="https://www.svgrepo.com/show/513414/photo-camera.svg" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <!-- Navbar -->
    <nav class="bg-white shadow-md" x-data="{ isOpen: false, userMenuOpen: false }">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <a href="#" class="text-2xl font-bold text-blue-600">PhotoShop</a>
                <div class="hidden md:flex space-x-8">
                    <a href="{{route('home')}}" class="text-gray-700 hover:text-blue-600 transition duration-300">Accueil</a>
                    <a href="{{route('product.all')}}" class="text-gray-700 hover:text-blue-600 transition duration-300">Produits</a>
                    <a href="" class="text-gray-700 hover:text-blue-600 transition duration-300">À propos</a>
                    <a href="" class="text-gray-700 hover:text-blue-600 transition duration-300">Contact</a>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Icône de panier avec nombre d'articles -->
                    <a href="{{route('cart.index')}}" class="text-gray-700 hover:text-blue-600 transition duration-300 relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full text-xs px-2 py-1">
                            {{ $cartItemCount ?? 0 }}
                        </span>
                    </a>

                    <!-- Icône de login/profil utilisateur -->
                    <div class="relative" x-data="{ open: false }">
                        @auth
                            <button @click="open = !open" class="flex items-center focus:outline-none">
                                <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="{{ auth()->user()->name }}" class="h-8 w-8 rounded-full object-cover">
                            </button>
                            <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                                <a href="{{route('profile.show')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Se déconnecter</button>
                                </form>
                            </div>
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </a>
                        @endauth
                    </div>

                    <button @click="isOpen = !isOpen" class="text-gray-700 hover:text-blue-600 focus:outline-none transition duration-300 md:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Mobile menu -->
            <div class="md:hidden" x-show="isOpen" @click.away="isOpen = false">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a href="index.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition duration-300">Accueil</a>
                    <a href="pages.html" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition duration-300">Produits</a>
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition duration-300">À propos</a>
                    <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-blue-600 hover:bg-gray-50 transition duration-300">Contact</a>
                </div>
            </div>
        </div>
    </nav>
