<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture - PhotoSop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="max-w-4xl mx-auto my-10 bg-white shadow-lg rounded-lg overflow-hidden">
        <header class="text-center py-6 bg-gray-800 text-white">
            <img src="https://placehold.co/200x100?text=PhotoSop" alt="PhotoSop Logo" class="mx-auto mb-4 w-48">
            <h1 class="text-3xl font-bold">PhotoSop</h1>
        </header>
        <main class="p-8">
            <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b-2 border-gray-800 pb-2">
                <i class="fas fa-file-invoice mr-2"></i>Facture
            </h2>
            <div class="flex flex-wrap -mx-4 mb-8">
                <div class="w-full md:w-1/2 px-4 mb-4">
                    <h3 class="text-lg font-semibold mb-2 text-gray-800">
                        <i class="fas fa-user mr-2"></i>Informations client
                    </h3>
                    <p>Nom : Marie Dupont</p>
                    <p>Email : marie.dupont@example.com</p>
                    <p>Téléphone : +33 6 12 34 56 78</p>
                    <p>Adresse : 123 Rue de Paris, 75001 Paris</p>
                </div>
                <div class="w-full md:w-1/2 px-4 mb-4">
                    <h3 class="text-lg font-semibold mb-2 text-gray-800">
                        <i class="fas fa-shopping-cart mr-2"></i>Détails de la commande
                    </h3>
                    <p>Numéro de commande : CMD12345</p>
                    <p>Date de commande : 15/06/2023</p>
                    <p>Mode de paiement : Carte bancaire</p>
                </div>
            </div>
            <table class="w-full mb-8">
                <thead>
                    <tr class="bg-gray-800 text-white">
                        <th class="py-2 px-4 text-left">Produit</th>
                        <th class="py-2 px-4 text-left">Quantité</th>
                        <th class="py-2 px-4 text-left">Prix unitaire</th>
                        <th class="py-2 px-4 text-left">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 px-4">Appareil photo DSLR Pro</td>
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">999 €</td>
                        <td class="py-2 px-4">999 €</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">Objectif grand angle</td>
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">299 €</td>
                        <td class="py-2 px-4">299 €</td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 px-4">Trépied professionnel</td>
                        <td class="py-2 px-4">1</td>
                        <td class="py-2 px-4">129 €</td>
                        <td class="py-2 px-4">129 €</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="border-b">
                        <td colspan="3" class="py-2 px-4 font-semibold">Sous-total</td>
                        <td class="py-2 px-4">1427 €</td>
                    </tr>
                    <tr class="border-b">
                        <td colspan="3" class="py-2 px-4 font-semibold">TVA (20%)</td>
                        <td class="py-2 px-4">285,40 €</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="py-2 px-4 font-semibold">Frais de livraison</td>
                        <td class="py-2 px-4">Gratuit</td>
                    </tr>
                </tfoot>
            </table>
            <div class="bg-gray-100 p-6 rounded-lg">
                <h3 class="text-lg font-semibold mb-2 text-gray-800">
                    <i class="fas fa-calculator mr-2"></i>Récapitulatif
                </h3>
                <p class="text-xl font-bold text-gray-800">Montant total : 1712,40 €</p>
            </div>
        </main>
        <footer class="text-center py-6 bg-gray-800 text-white">
            <p>Merci pour votre achat chez PhotoSop. Pour toute question, contactez-nous à support@photosop.com</p>
        </footer>
    </div>
</body>
</html>
