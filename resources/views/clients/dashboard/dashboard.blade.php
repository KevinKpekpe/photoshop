@extends('clients.base')
@section('content')
    <!-- Dashboard Content -->
    <div class="container mx-auto px-4 py-8 flex">
        @include('clients.layouts.sidebar')

        <!-- Main Content -->
        <div class="flex-1">
            <h1 class="text-3xl font-bold mb-8 animate-fade-in-up">Tableau de bord</h1>

            <!-- User Info -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8 animate-fade-in-up">
                <h2 class="text-2xl font-semibold mb-4">Informations personnelles</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-600">Nom: <span class="font-semibold">Jean Dupont</span></p>
                        <p class="text-gray-600">Email: <span class="font-semibold">jean.dupont@example.com</span></p>
                    </div>
                    <div>
                        <p class="text-gray-600">Téléphone: <span class="font-semibold">+33 1 23 45 67 89</span></p>
                        <p class="text-gray-600">Adresse: <span class="font-semibold">123 Rue de la Photo, 75000 Paris</span></p>
                    </div>
                </div>
            </div>

            <!-- Orders List -->
            <div class="bg-white rounded-lg shadow-md p-6 animate-fade-in-up">
                <h2 class="text-2xl font-semibold mb-4">Mes commandes</h2>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 text-left">N° de commande</th>
                                <th class="px-4 py-2 text-left">Date</th>
                                <th class="px-4 py-2 text-left">Montant</th>
                                <th class="px-4 py-2 text-left">État</th>
                                <th class="px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border px-4 py-2">#12345</td>
                                <td class="border px-4 py-2">01/05/2023</td>
                                <td class="border px-4 py-2">249,99 €</td>
                                <td class="border px-4 py-2"><span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Livré</span></td>
                                <td class="border px-4 py-2">
                                    <button class="text-blue-600 hover:text-blue-800" onclick="toggleOrderDetails('order-12345')">Voir détails</button>
                                </td>
                            </tr>
                            <tr id="order-12345" class="hidden bg-gray-50">
                                <td colspan="5" class="border px-4 py-2">
                                    <h3 class="font-semibold mb-2">Détails de la commande #12345</h3>
                                    <ul>
                                        <li>Canon EOS R6 - 1999,99 €</li>
                                        <li>Objectif Canon RF 24-105mm f/4L IS USM - 1299,99 €</li>
                                    </ul>
                                    <p class="mt-2">Total: 3299,98 €</p>
                                    <p>Adresse de livraison: 123 Rue de la Photo, 75000 Paris</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="border px-4 py-2">#12346</td>
                                <td class="border px-4 py-2">15/04/2023</td>
                                <td class="border px-4 py-2">99,99 €</td>
                                <td class="border px-4 py-2"><span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-sm">En cours</span></td>
                                <td class="border px-4 py-2">
                                    <button class="text-blue-600 hover:text-blue-800" onclick="toggleOrderDetails('order-12346')">Voir détails</button>
                                </td>
                            </tr>
                            <tr id="order-12346" class="hidden bg-gray-50">
                                <td colspan="5" class="border px-4 py-2">
                                    <h3 class="font-semibold mb-2">Détails de la commande #12346</h3>
                                    <ul>
                                        <li>Trépied Manfrotto - 99,99 €</li>
                                    </ul>
                                    <p class="mt-2">Total: 99,99 €</p>
                                    <p>Adresse de livraison: 123 Rue de la Photo, 75000 Paris</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
