@extends('admin.base')
@section('content')
<div class="flex-1 overflow-y-auto">
    <!-- Top Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold">{{ isset($category) ? 'Modifier la catégorie' : 'Ajouter une catégorie' }}</h2>
            <a href="{{ route('admin.categories.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded-full text-sm hover:bg-gray-700 transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
            </a>
        </div>
    </nav>

    <!-- Add/Edit Category Form -->
    <div class="p-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="code" class="block text-sm font-medium text-gray-700 mb-2">Code</label>
                        <input type="text" id="code" name="code" value="{{ old('code', $category->code ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $category->name ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea id="description" name="description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $category->description ?? '') }}</textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Photo</label>
                        <input type="file" id="photo" name="photo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    @if(isset($category) && $category->photo)
                        <div class="md:col-span-2">
                            <img src="{{ asset('storage/' . $category->photo) }}" alt="Category photo" class="w-32 h-32 object-cover rounded-md">
                        </div>
                    @endif
                </div>
                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-full text-sm hover:bg-blue-700 transition duration-300">
                        {{ isset($category) ? 'Mettre à jour' : 'Enregistrer' }} la catégorie
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
