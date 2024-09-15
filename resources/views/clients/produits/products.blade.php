@extends('clients.base')
@section('content')
    <!-- En-tête de la page Produits -->
    <header class="bg-blue-600 text-white py-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold mb-4">Nos Produits</h1>
            <p class="text-xl">Découvrez notre large gamme d'équipements photographiques.</p>
        </div>
    </header>

    <!-- Section de recherche et filtres -->
    <section class="py-8 bg-white shadow-md">
        <div class="container mx-auto px-4">
            <form action="{{ route('product.all') }}" method="GET">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <!-- Barre de recherche -->
                    <div class="md:col-span-4">
                        <input type="text" name="search" placeholder="Rechercher un produit..." class="w-full px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600" value="{{ request('search') }}">
                    </div>

                    <!-- Filtre par prix -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Prix</label>
                        <select name="price" id="price" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600">
                            <option value="">Tous les prix</option>
                            <option value="0-100" {{ request('price') == '0-100' ? 'selected' : '' }}>0€ - 100€</option>
                            <option value="100-500" {{ request('price') == '100-500' ? 'selected' : '' }}>100€ - 500€</option>
                            <option value="500-1000" {{ request('price') == '500-1000' ? 'selected' : '' }}>500€ - 1000€</option>
                            <option value="1000-999999" {{ request('price') == '1000-999999' ? 'selected' : '' }}>1000€ et plus</option>
                        </select>
                    </div>

                    <!-- Filtre par catégorie -->
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                        <select name="category" id="category" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600">
                            <option value="">Toutes les catégories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Filtre par marque -->
                    <div>
                        <label for="marque" class="block text-sm font-medium text-gray-700 mb-1">Marque</label>
                        <select name="marque" id="marque" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-600">
                            <option value="">Toutes les marques</option>
                            @foreach($marques as $marque)
                                <option value="{{ $marque->id }}" {{ request('marque') == $marque->id ? 'selected' : '' }}>{{ $marque->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Bouton de filtrage -->
                    <div>
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300 mt-6">Filtrer</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Liste des produits -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl animate-on-scroll">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/50' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="font-bold text-lg mb-2">{{ $product->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ Str::limit($product->description, 100) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-800 font-bold">{{ number_format($product->price, 2) }} €</span>
                                <a href="{{ route('product.show', $product->id) }}" class="bg-blue-600 text-white py-2 px-4 rounded-full text-sm hover:bg-blue-700 transition duration-300">Voir le produit</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Pagination -->
    <section class="py-8">
        <div class="container mx-auto px-4">
            <div class="flex justify-center">
                {{ $products->links() }}
            </div>
        </div>
    </section>
@endsection
