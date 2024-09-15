@extends('admin.base')
@section('content')


        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto">
            <!-- Top Navbar -->
            <nav class="bg-white shadow-md p-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-xl font-semibold">Tableau de bord</h2>
                    <div class="flex items-center space-x-4">
                        <button class="text-gray-600 hover:text-gray-800">
                            <i class="fas fa-bell"></i>
                        </button>
                        <button class="text-gray-600 hover:text-gray-800">
                            <i class="fas fa-user-circle"></i>
                        </button>
                    </div>
                </div>
            </nav>

            <!-- Dashboard Content -->
            <div class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow-md p-6 animate-fade-in-up">
                        <h3 class="text-lg font-semibold mb-2">Utilisateurs</h3>
                        <p class="text-3xl font-bold">1,234</p>
                        <p class="text-green-500"><i class="fas fa-arrow-up mr-1"></i> 5.3%</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 animate-fade-in-up" style="animation-delay: 0.2s;">
                        <h3 class="text-lg font-semibold mb-2">Commandes</h3>
                        <p class="text-3xl font-bold">567</p>
                        <p class="text-red-500"><i class="fas fa-arrow-down mr-1"></i> 2.1%</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 animate-fade-in-up" style="animation-delay: 0.4s;">
                        <h3 class="text-lg font-semibold mb-2">Revenus</h3>
                        <p class="text-3xl font-bold">$12,345</p>
                        <p class="text-green-500"><i class="fas fa-arrow-up mr-1"></i> 8.7%</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6 animate-fade-in-up" style="animation-delay: 0.6s;">
                        <h3 class="text-lg font-semibold mb-2">Produits</h3>
                        <p class="text-3xl font-bold">89</p>
                        <p class="text-gray-500">Total</p>
                    </div>
                </div>

                <!-- Charts -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4">Ventes mensuelles</h3>
                        <canvas id="salesChart"></canvas>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <h3 class="text-lg font-semibold mb-4">Répartition des produits</h3>
                        <canvas id="productsChart"></canvas>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold mb-4">Commandes récentes</h3>
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-gray-600 border-b">
                                <th class="pb-3">ID</th>
                                <th class="pb-3">Client</th>
                                <th class="pb-3">Produit</th>
                                <th class="pb-3">Montant</th>
                                <th class="pb-3">Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td class="py-3">#1234</td>
                                <td>John Doe</td>
                                <td>Photo Canvas</td>
                                <td>$89.99</td>
                                <td><span class="bg-green-200 text-green-800 py-1 px-2 rounded-full text-sm">Complété</span></td>
                            </tr>
                            <tr class="border-b">
                                <td class="py-3">#1235</td>
                                <td>Jane Smith</td>
                                <td>Photo Frame</td>
                                <td>$59.99</td>
                                <td><span class="bg-yellow-200 text-yellow-800 py-1 px-2 rounded-full text-sm">En cours</span></td>
                            </tr>
                            <tr>
                                <td class="py-3">#1236</td>
                                <td>Bob Johnson</td>
                                <td>Photo Album</td>
                                <td>$129.99</td>
                                <td><span class="bg-blue-200 text-blue-800 py-1 px-2 rounded-full text-sm">Expédié</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
