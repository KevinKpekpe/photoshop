@extends('admin.base')

@section('content')
<div class="flex-1 overflow-y-auto">
    <!-- Top Navbar -->
    <nav class="bg-white shadow-md p-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold">{{ isset($user) ? 'Modifier' : 'Ajouter' }} un utilisateur</h2>
            <a href="{{ route('admin.users.index') }}" class="bg-gray-600 text-white py-2 px-4 rounded-full text-sm hover:bg-gray-700 transition duration-300">
                <i class="fas fa-arrow-left mr-2"></i>Retour à la liste
            </a>
        </div>
    </nav>

    <!-- Add/Edit User Form -->
    <div class="p-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ isset($user) ? route('admin.users.update', ['user' => $user->id]) : route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($user) && isset($user->id))
                @method('PUT')
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label for="postnom" class="block text-sm font-medium text-gray-700 mb-2">Postnom</label>
                        <input type="text" id="postnom" name="postnom" value="{{ old('postnom', $user->postnom ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label for="prenom" class="block text-sm font-medium text-gray-700 mb-2">Prénom</label>
                        <input type="text" id="prenom" name="prenom" value="{{ old('prenom', $user->prenom ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label for="sexe" class="block text-sm font-medium text-gray-700 mb-2">Sexe</label>
                        <select id="sexe" name="sexe" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Sélectionner le sexe</option>
                            <option value="Homme" {{ old('sexe', $user->sexe ?? '') == 'Homme' ? 'selected' : '' }}>Homme</option>
                            <option value="Femme" {{ old('sexe', $user->sexe ?? '') == 'Femme' ? 'selected' : '' }}>Femme</option>
                        </select>
                    </div>

                    <div>
                        <label for="date_naissance" class="block text-sm font-medium text-gray-700 mb-2">Date de Naissance</label>
                        <input type="date" id="date_naissance" name="date_naissance" value="{{ old('date_naissance', $user->date_naissance ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label for="adresse" class="block text-sm font-medium text-gray-700 mb-2">Adresse</label>
                        <input type="text" id="adresse" name="adresse" value="{{ old('adresse', $user->adresse ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label for="telephone" class="block text-sm font-medium text-gray-700 mb-2">Téléphone</label>
                        <input type="text" id="telephone" name="telephone" value="{{ old('telephone', $user->telephone ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label for="code_postal" class="block text-sm font-medium text-gray-700 mb-2">Code Postal</label>
                        <input type="text" id="code_postal" name="code_postal" value="{{ old('code_postal', $user->code_postal ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email ?? '') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Mot de passe</label>
                        <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" {{ isset($user) ? '' : 'required' }}>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirmer le mot de passe</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" {{ isset($user) ? '' : 'required' }}>
                    </div>

                    <div>
                        <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Rôle</label>
                        <select id="role" name="role" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Sélectionner un rôle</option>
                            <option value="Client" {{ old('role', $user->role ?? '') == 'Client' ? 'selected' : '' }}>Client</option>
                            <option value="Admin" {{ old('role', $user->role ?? '') == 'Admin' ? 'selected' : '' }}>Administrateur</option>
                        </select>
                    </div>

                    <div class="md:col-span-2">
                        <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Photo de profil</label>
                        <input type="file" id="photo" name="photo" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @if(isset($user) && $user->photo)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}" class="w-32 h-32 object-cover rounded-full">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-full text-sm hover:bg-blue-700 transition duration-300">
                        {{ isset($user) ? 'Mettre à jour' : 'Enregistrer' }} l'utilisateur
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
