@extends('clients.base')
@section('content')
    <!-- Dashboard Content -->
    <div class="container mx-auto px-4 py-8 flex">
        @include('clients.layouts.sidebar')
        <!-- Main Content -->
        <div class="flex-1">
            <h1 class="text-3xl font-bold mb-8 animate-fade-in-up">Mon profil</h1>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 animate-fade-in-up" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white rounded-lg shadow-md p-6 animate-fade-in-up">
                <div class="flex items-center mb-6">
                    <div class="w-24 h-24 bg-gray-300 rounded-full overflow-hidden mr-6">
                        @if($user->photo)
                            <img src="{{ asset('storage/' . $user->photo) }}" alt="Photo de profil" class="w-full h-full object-cover">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Photo de profil par défaut" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div>
                        <h2 class="text-2xl font-semibold">{{ $user->name }} {{ $user->postnom }} {{ $user->prenom }}</h2>
                        <p class="text-gray-600">Membre depuis le {{ $user->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Informations personnelles</h3>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        <p><strong>Téléphone:</strong> {{ $user->telephone }}</p>
                        <p><strong>Adresse:</strong> {{ $user->adresse }}</p>
                        <p><strong>Code postal:</strong> {{ $user->code_postal }}</p>
                        <p><strong>Sexe:</strong> {{ $user->sexe }}</p>
                        <p><strong>Date de naissance:</strong> {{ $user->date_naissance->format('d/m/Y') }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Autres informations</h3>
                        <p><strong>Rôle:</strong> {{ $user->role }}</p>
                        @if($user->email_verified_at)
                            <p><strong>Email vérifié le:</strong> {{ $user->email_verified_at->format('d/m/Y') }}</p>
                        @else
                            <p><strong>Email:</strong> Non vérifié</p>
                        @endif
                    </div>
                </div>
                <div class="mt-6">
                    <a href="{{ route('profile.edit') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Modifier le profil</a>
                </div>
            </div>
        </div>
    </div>
@endsection
