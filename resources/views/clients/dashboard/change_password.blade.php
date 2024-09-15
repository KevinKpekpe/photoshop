@extends('clients.base')
@section('content')
    <!-- Dashboard Content -->
    <div class="container mx-auto px-4 py-8 flex">
        @include('clients.layouts.sidebar')

        <!-- Main Content -->
        <div class="flex-1">
            <h1 class="text-3xl font-bold mb-8 animate-fade-in-up">Changer le mot de passe</h1>

            <!-- Affichage des erreurs -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 animate-fade-in-up" role="alert">
                    <strong class="font-bold">Oups!</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Affichage du message de succès -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 animate-fade-in-up" role="alert">
                    <strong class="font-bold">Succès!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white rounded-lg shadow-md p-6 animate-fade-in-up">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="current_password" class="block text-gray-700 font-semibold mb-2">Mot de passe actuel</label>
                        <input type="password" id="current_password" name="current_password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="new_password" class="block text-gray-700 font-semibold mb-2">Nouveau mot de passe</label>
                        <input type="password" id="new_password" name="new_password"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="new_password_confirmation" class="block text-gray-700 font-semibold mb-2">Confirmer le nouveau mot de passe</label>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Changer le mot de passe</button>
                </form>
            </div>
        </div>
    </div>
@endsection
