<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - PhotoShop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md animate-fade-in-up">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Connexion</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.dologin') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Adresse e-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>
            <div class="flex items-center justify-between mb-4">
                <div>
                    <input type="checkbox" id="remember" name="remember" class="mr-2">
                    <label for="remember" class="text-sm text-gray-600">Se souvenir de moi</label>
                </div>
                <a href="" class="text-sm text-blue-600 hover:underline">Mot de passe oublié ?</a>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">Se connecter</button>
        </form>
    </div>
</body>

</html>
