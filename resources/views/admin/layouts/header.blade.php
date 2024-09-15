<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.3.0/alpine-ie11.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        .toggle-checkbox:checked {
            @apply: right-0 border-green-400;
            right: 0;
            border-color: #68D391;
        }
        .toggle-checkbox:checked + .toggle-label {
            @apply: bg-green-400;
            background-color: #68D391;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <h1 class="text-2xl font-bold mb-4">PhotoShop Admin</h1>
                <nav>
                    <ul class="space-y-2">
                        <li>
                            <a href="{{route('admin.home')}}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700 rounded transition duration-200">
                                <i class="fas fa-tachometer-alt mr-2"></i> Tableau de bord
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.users.index')}}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700 rounded transition duration-200">
                                <i class="fas fa-users mr-2"></i> Utilisateurs
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.orders.index')}}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700 rounded transition duration-200">
                                <i class="fas fa-shopping-cart mr-2"></i> Commandes
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.products.index')}}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700 rounded transition duration-200">
                                <i class="fas fa-box mr-2"></i> Produits
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.marques.index')}}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700 rounded transition duration-200">
                                <i class="fas fa-tags mr-2"></i> Marques
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.categories.index')}}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700 rounded transition duration-200">
                                <i class="fas fa-list mr-2"></i> Catégories
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.coupons.index')}}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700 rounded transition duration-200">
                                <i class="fas fa-ticket-alt mr-2"></i> Coupons
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.payments.index')}}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700 rounded transition duration-200">
                                <i class="fas fa-credit-card mr-2"></i> Paiements
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 text-gray-300 hover:bg-gray-700 rounded transition duration-200">
                                <i class="fas fa-star mr-2"></i> Avis
                            </a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 text-gray-300 hover:bg-gray-700 rounded transition duration-200">
                                <i class="fas fa-heart mr-2"></i> Wishlist
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.logout')}}" class="block py-2 px-4 text-gray-300 hover:bg-gray-700 rounded transition duration-200">
                                <i class="fas fa-sign-out-alt mr-2"></i> Déconnexion
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
