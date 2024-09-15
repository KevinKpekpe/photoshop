@extends('admin.base')
@section('content')
<div class="flex-1 overflow-y-auto">
    <!-- Top Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold">Liste des catégories</h2>
            <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-full text-sm hover:bg-blue-700 transition duration-300">
                <i class="fas fa-plus mr-2"></i>Ajouter une catégorie
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
                <input type="text" placeholder="Rechercher une catégorie..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                <div class="absolute left-3 top-2 text-gray-400">
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories List -->
    <div class="p-6">
        <div class="bg-white rounded-lg shadow-md p-6 overflow-x-auto">
            @if($categories->isEmpty())
                <div class="text-center text-gray-600">
                    Aucune catégorie n'est disponible dans la base de données.
                </div>
            @else
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-gray-600 border-b">
                            <th class="pb-3 px-4">Photo</th>
                            <th class="pb-3 px-4">Code</th>
                            <th class="pb-3 px-4">Nom</th>
                            <th class="pb-3 px-4">Description</th>
                            <th class="pb-3 px-4">Actif</th>
                            <th class="pb-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr class="border-b">
                                <td class="px-4 py-2">
                                    @if($category->photo)
                                        <img src="{{ asset('storage/' . $category->photo) }}" alt="Category photo" class="w-12 h-12 object-cover rounded-full">
                                    @else
                                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-2">{{ $category->code }}</td>
                                <td class="px-4 py-2">{{ $category->name }}</td>
                                <td class="px-4 py-2">{{ $category->description }}</td>
                                <td class="px-4 py-2">
                                    @if($category->actif)
                                        <span class="bg-green-200 text-green-800 py-1 px-2 rounded-full text-sm">Actif</span>
                                    @else
                                        <span class="bg-red-200 text-red-800 py-1 px-2 rounded-full text-sm">Inactif</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-edit"></i></a>
                                    @if($category->actif)
                                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800"><i class="fas fa-trash"></i></button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.categories.activate', $category) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="text-green-600 hover:text-green-800"><i class="fas fa-check"></i></button>
                                        </form>
                                    @endif
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
