
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification d'Email - PhotoShop</title>
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
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Vérification d'Email</h2>
        <p class="text-center text-gray-600 mb-6">Un email de vérification a été envoyé à votre adresse email. Veuillez vérifier votre boîte de réception et cliquer sur le lien pour confirmer votre inscription.</p>
        <form action="{{ route('resend.verification.email') }}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{ session('email') }}">
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">Renvoyer l'Email</button>
        </form>
        <p class="mt-6 text-center text-sm text-gray-600">
            Si vous n'avez pas reçu l'email, vérifiez votre dossier de spam ou <a href="#" class="text-blue-600 hover:underline">essayez une autre adresse</a>.
        </p>
    </div>
</body>

</html>
