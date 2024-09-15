@extends('clients.base')
@section('content')
    <!-- Contenu du panier -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold mb-8">Votre Panier</h1>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            @if(count($cart) > 0)
                <!-- Tableau du panier (inchangé) -->
                                <!-- Tableau du panier -->
                                <div class="overflow-x-auto bg-white shadow-md rounded-lg animate-fade-in-up">
                                    <table class="w-full table-auto">
                                        <thead>
                                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                                <th class="py-3 px-6 text-left">Produit</th>
                                                <th class="py-3 px-6 text-center">Prix unitaire</th>
                                                <th class="py-3 px-6 text-center">Quantité</th>
                                                <th class="py-3 px-6 text-center">Total</th>
                                                <th class="py-3 px-6 text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-gray-600 text-sm font-light">
                                            @foreach($cart as $id => $details)
                                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="mr-2">
                                                                <img class="w-16 h-16 rounded" src="{{ asset('storage/' . $details['image']) }}" alt="{{ $details['name'] }}">
                                                            </div>
                                                            <span class="font-medium">{{ $details['name'] }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="py-3 px-6 text-center">
                                                        <span>{{ number_format($details['price'], 2) }} €</span>
                                                    </td>
                                                    <td class="py-3 px-6 text-center">
                                                        <form action="{{ route('cart.update') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $id }}">
                                                            <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="w-16 text-center border rounded-md">
                                                            <button type="submit" class="ml-2 text-blue-500 hover:text-blue-700">
                                                                <i class="fas fa-sync-alt"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td class="py-3 px-6 text-center">
                                                        <span>{{ number_format($details['price'] * $details['quantity'], 2) }} €</span>
                                                    </td>
                                                    <td class="py-3 px-6 text-center">
                                                        <form action="{{ route('cart.remove') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{ $id }}">
                                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                               <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                <!-- Actions du panier -->
                <div class="mt-8 flex justify-between items-center animate-fade-in-up">
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition duration-300">
                            Vider le panier
                        </button>
                    </form>
                </div>

                <!-- Résumé du panier -->
                <div class="mt-8 bg-white p-6 rounded-lg shadow-md animate-fade-in-up">
                    <h2 class="text-2xl font-bold mb-4">Résumé de la commande</h2>
                    <div class="flex justify-between mb-2">
                        <span>Sous-total</span>
                        <span>{{ number_format($total, 2) }} €</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Frais de livraison</span>
                        <span>Gratuit</span>
                    </div>
                    <div class="flex justify-between font-bold text-lg mt-4 pt-4 border-t">
                        <span>Total</span>
                        <span>{{ number_format($total, 2) }} €</span>
                    </div>
                    <a href="" class="w-full mt-6 bg-green-500 text-white py-3 rounded-lg hover:bg-green-600 transition duration-300 inline-block text-center">
                        Procéder au paiement
                    </a>
                </div>
            @else
                <div class="text-center text-gray-600">
                    Votre panier est vide.
                </div>
            @endif
        </div>
    </section>
@endsection
