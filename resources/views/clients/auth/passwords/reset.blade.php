<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réinitialisation du Mot de Passe - PhotoShop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Réinitialisation du Mot de Passe</h2>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Adresse e-mail</label>
                <input type="email" id="email" name="email" value="{{ $email ?? old('email') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required autofocus>
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <div class="mb-4">
                <label for="password-confirm" class="block mb-2 text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                <input type="password" id="password-confirm" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">Réinitialiser le mot de passe</button>
        </form>
    </div>
</body>
</html>
