@extends('admin.base')
@section('content')
<div class="flex-1 overflow-y-auto">
    <!-- Top Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold">Liste des produits</h2>
            <a href="{{ route('admin.products.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-full text-sm hover:bg-blue-700 transition duration-300">
                <i class="fas fa-plus mr-2"></i>Ajouter un produit
            </a>
        </div>
    </nav>

    <!-- Message de succès -->
    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 rounded-lg shadow-md m-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Bar -->
    <div class="p-4 bg-white shadow-md">
        <div class="max-w-3xl mx-auto">
            <div class="relative">
                <input type="text" placeholder="Rechercher un produit..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div class="absolute left-3 top-2 text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Products List -->
    <div class="p-6">
        <div class="bg-white rounded-lg shadow-md p-6 overflow-x-auto">
            @if($products->isEmpty())
                <div class="text-center text-gray-600">
                    Aucun produit n'est disponible dans la base de données.
                </div>
            @else
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-gray-600 border-b">
                            <th class="pb-3">Image</th>
                            <th class="pb-3">Code</th>
                            <th class="pb-3">Titre</th>
                            <th class="pb-3">Prix</th>
                            <th class="pb-3">Catégorie</th>
                            <th class="pb-3">Marque</th>
                            <th class="pb-3">Stock</th>
                            <th class="pb-3">Actif</th>
                            <th class="pb-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr class="border-b">
                                <td class="py-3">
                                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/50' }}" alt="{{ $product->title }}" class="w-12 h-12 object-cover rounded">
                                </td>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->title }}</td>
                                <td>${{ $product->price }}</td>
                                <td>{{ $product->category->name ?? 'N/A' }}</td>
                                <td>{{ $product->marque->name ?? 'N/A' }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    @if($product->actif)
                                        <span class="bg-green-200 text-green-800 py-1 px-2 rounded-full text-sm">Actif</span>
                                    @else
                                        <span class="bg-red-200 text-red-800 py-1 px-2 rounded-full text-sm">Inactif</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
