@extends('admin.base')
@section('content')
<div class="flex-1 overflow-y-auto">
    <!-- Top Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold">Liste des utilisateurs</h2>
            <a href="{{ route('admin.users.create') }}" class="bg-blue-600 text-white py-2 px-4 rounded-full text-sm hover:bg-blue-700 transition duration-300">
                <i class="fas fa-plus mr-2"></i>Ajouter un utilisateur
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
            <form action="{{ route('admin.users.index') }}" method="GET" class="relative">
                <input type="text" name="search" placeholder="Rechercher un utilisateur..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('search') }}">
                <button type="submit" class="absolute left-3 top-2 text-gray-400">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
    </div>

    <!-- Users List -->
    <div class="p-6">
        <div class="bg-white rounded-lg shadow-md p-6 overflow-x-auto">
            @if($users->isEmpty())
                <div class="text-center text-gray-600">
                    Aucun utilisateur n'est disponible dans la base de données.
                </div>
            @else
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-gray-600 border-b">
                            <th class="pb-3">Photo</th>
                            <th class="pb-3">Nom</th>
                            <th class="pb-3">Email</th>
                            <th class="pb-3">Rôle</th>
                            <th class="pb-3">Statut</th>
                            <th class="pb-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="border-b">
                                <td class="py-3">
                                    <img src="{{ $user->photo ? asset('storage/' . $user->photo) : 'https://via.placeholder.com/50' }}" alt="{{ $user->name }}" class="w-12 h-12 object-cover rounded-full">
                                </td>
                                <td>{{ $user->name }} {{ $user->postnom }} {{ $user->prenom }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>
                                    @if($user->active)
                                        <span class="bg-green-200 text-green-800 py-1 px-2 rounded-full text-sm">Actif</span>
                                    @else
                                        <span class="bg-red-200 text-red-800 py-1 px-2 rounded-full text-sm">Inactif</span>
                                    @endif
                                </td>
                                <td class="flex space-x-2">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:text-blue-800"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.users.toggle-active', $user) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="text-yellow-600 hover:text-yellow-800"><i class="fas fa-toggle-on"></i></button>
                                    </form>
                                    <form action="{{ route('admin.users.reset-password', $user) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit" class="text-green-600 hover:text-green-800"><i class="fas fa-key"></i></button>
                                    </form>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block">
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

    <!-- Pagination -->
    <div class="mt-4 p-4">
        {{ $users->links() }}
    </div>
</div>
@endsection
