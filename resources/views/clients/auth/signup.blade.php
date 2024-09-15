<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - PhotoShop</title>
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
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-4xl animate-fade-in-up">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Inscription</h2>

        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('signup') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
                <div>
                    <label for="postnom" class="block mb-2 text-sm font-medium text-gray-700">Post-nom</label>
                    <input type="text" id="postnom" name="postnom" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
                <div>
                    <label for="prenom" class="block mb-2 text-sm font-medium text-gray-700">Prénom</label>
                    <input type="text" id="prenom" name="prenom" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="sexe" class="block mb-2 text-sm font-medium text-gray-700">Sexe</label>
                    <select id="sexe" name="sexe" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        <option value="M">Masculin</option>
                        <option value="F">Féminin</option>
                    </select>
                </div>
                <div>
                    <label for="date_naissance" class="block mb-2 text-sm font-medium text-gray-700">Date de naissance</label>
                    <input type="date" id="date_naissance" name="date_naissance" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
                <div>
                    <label for="adresse" class="block mb-2 text-sm font-medium text-gray-700">Adresse</label>
                    <input type="text" id="adresse" name="adresse" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="telephone" class="block mb-2 text-sm font-medium text-gray-700">Téléphone</label>
                    <input type="tel" id="telephone" name="telephone" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
                <div>
                    <label for="code_postal" class="block mb-2 text-sm font-medium text-gray-700">Code postal</label>
                    <input type="text" id="code_postal" name="code_postal" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Adresse e-mail</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Mot de passe</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
                <div>
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-700">Confirmer le mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                </div>
                <div>
                    <label for="photo" class="block mb-2 text-sm font-medium text-gray-700">Photo de profil</label>
                    <input type="file" id="photo" name="photo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600">
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">S'inscrire</button>
        </form>

        <div class="mt-6">
            <div class="relative">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">Ou inscrivez-vous avec</span>
                </div>
            </div>
            <div class="mt-6">
                <button class="w-full bg-red-600 text-white py-2 px-4 rounded-md hover:bg-red-700 transition duration-300 flex items-center justify-center">
                    <i class="fab fa-google mr-2"></i> Google
                </button>
            </div>
        </div>

        <p class="mt-8 text-center text-sm text-gray-600">
            Vous avez déjà un compte ? <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Se connecter</a>
        </p>
    </div>
</body>

</html>
