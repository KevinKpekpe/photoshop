@extends('admin.base')
@section('content')
<div class="flex-1 overflow-y-auto">
    <!-- Top Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold">Ajouter un produit</h2>
            <a href="{{ route('admin.products.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded-full text-sm hover:bg-gray-700 transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
            </a>
        </div>
    </nav>

    <!-- Add Product Form -->
    <div class="p-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($product))
                    @method('PUT')
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="code" class="block text-sm font-medium text-gray-700 mb-2">Code</label>
                        <input type="text" id="code" name="code" value="{{ old('code', $product->code ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titre</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $product->title ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea id="description" name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description ?? '') }}</textarea>
                    </div>
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Prix</label>
                        <input type="number" id="price" name="price" value="{{ old('price', $product->price ?? '') }}" step="0.01" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
                        <select id="category" name="category_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Sélectionner une catégorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="brand" class="block text-sm font-medium text-gray-700 mb-2">Marque</label>
                        <select id="brand" name="marque_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="">Sélectionner une marque</option>
                            @foreach($marques as $marque)
                                <option value="{{ $marque->id }}" {{ old('marque_id', $product->marque_id ?? '') == $marque->id ? 'selected' : '' }}>
                                    {{ $marque->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">Stock</label>
                        <input type="number" id="stock" name="stock" value="{{ old('stock', $product->stock ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="active" class="block text-sm font-medium text-gray-700 mb-2">Actif</label>
                        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" name="active" id="active" {{ old('active', $product->active ?? false) ? 'checked' : '' }} class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"/>
                            <label for="active" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                        </div>
                    </div>
                    <div class="md:col-span-2">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                        <input type="file" id="image" name="image" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @if(isset($product) && $product->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="w-32 h-32 object-cover">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-full text-sm hover:bg-blue-700 transition duration-300">
                        {{ isset($product) ? 'Mettre à jour' : 'Enregistrer' }} le produit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
