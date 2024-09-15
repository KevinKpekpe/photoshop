@extends('clients.base')
@section('content')
    <!-- Dashboard Content -->
    <div class="container mx-auto px-4 py-8 flex">
        @include('clients.layouts.sidebar')

        <!-- Main Content -->
        <div class="flex-1">
            <h1 class="text-3xl font-bold mb-8 animate-fade-in-up">Modifier le profil</h1>

            <div class="bg-white rounded-lg shadow-md p-6 animate-fade-in-up">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nom</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>
                        <div>
                            <label for="postnom" class="block mb-2 text-sm font-medium text-gray-700">Post-nom</label>
                            <input type="text" id="postnom" name="postnom" value="{{ old('postnom', $user->postnom) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="prenom" class="block mb-2 text-sm font-medium text-gray-700">Prénom</label>
                        <input type="text" id="prenom" name="prenom" value="{{ old('prenom', $user->prenom) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-700">Sexe</label>
                        <div class="flex">
                            <label class="mr-4">
                                <input type="radio" name="sexe" value="Homme" {{ old('sexe', $user->sexe) === 'M' ? 'checked' : '' }} class="mr-2" required>
                                Homme
                            </label>
                            <label>
                                <input type="radio" name="sexe" value="Femme" {{ old('sexe', $user->sexe) === 'F' ? 'checked' : '' }} class="mr-2" required>
                                Femme
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="date_naissance" class="block mb-2 text-sm font-medium text-gray-700">Date de naissance</label>
                        <input type="date" id="date_naissance" name="date_naissance" value="{{ old('date_naissance', $user->date_naissance->format('Y-m-d')) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <div class="mb-4">
                        <label for="adresse" class="block mb-2 text-sm font-medium text-gray-700">Adresse</label>
                        <input type="text" id="adresse" name="adresse" value="{{ old('adresse', $user->adresse) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <div class="mb-4">
                        <label for="telephone" class="block mb-2 text-sm font-medium text-gray-700">Téléphone</label>
                        <input type="tel" id="telephone" name="telephone" value="{{ old('telephone', $user->telephone) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <div class="mb-4">
                        <label for="code_postal" class="block mb-2 text-sm font-medium text-gray-700">Code postal</label>
                        <input type="text" id="code_postal" name="code_postal" value="{{ old('code_postal', $user->code_postal) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                    </div>
                    <div class="mb-4">
                        <label for="photo" class="block mb-2 text-sm font-medium text-gray-700">Photo</label>
                        <input type="file" id="photo" name="photo" accept="image/*" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                        @if($user->photo)
                            <div class="mt-2">
                                <p class="text-sm text-gray-600 mb-2">Photo actuelle :</p>
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo de profil actuelle" class="w-32 h-32 object-cover rounded-full">
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">Mettre à jour le profil</button>
                </form>
            </div>
        </div>
    </div>
@endsection
