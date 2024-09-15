@extends('clients.base')
@section('content')
    <!-- Détails du produit -->
    <section class="py-16">
        <div class="container mx-auto px-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Image du produit -->
                <div class="animate-on-scroll">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/50' }}" alt="{{ $product->name }}"  class="w-full h-auto rounded-lg shadow-lg">
                </div>

                <!-- Informations du produit -->
                <div class="animate-on-scroll">
                    <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                    <p class="text-gray-600 mb-4">Catégorie: {{ $product->category->name }}</p>
                    <p class="text-gray-600 mb-4">Marque: {{ $product->marque->name }}</p>
                    <p class="text-xl font-bold text-blue-600 mb-4">Prix:{{ $product->formattedPrice() }}</p>
                    <div class="flex items-center mb-4">
                        <div class="flex text-yellow-400">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= $product->reviews->avg('rating'))
                                    <i class="fas fa-star"></i>
                                @elseif ($i - 0.5 <= $product->reviews->avg('rating'))
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="ml-2 text-gray-600">({{ number_format($product->reviews->avg('rating'), 1) }}/5 - {{ $product->reviews->count() }} avis)</span>
                    </div>
                    <p class="text-gray-700 mb-6">{{ $product->description }}</p>

                    <!-- Formulaire d'ajout au panier (à implémenter plus tard) -->
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <div class="flex items-center mb-4">
                            <label for="quantity" class="mr-4">Quantité:</label>
                            <input type="number" id="quantity" name="quantity" min="1" value="1" class="w-20 px-2 py-1 border border-gray-300 rounded">
                        </div>
                        <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-full hover:bg-blue-700 transition duration-300">Ajouter au panier</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Produits de la même marque -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8">Autres produits de la même marque</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach($product->marque->products->where('id', '!=', $product->id)->take(4) as $similarProduct)
                    <div class="bg-white rounded-lg overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl animate-on-scroll">
                        <img src="{{ $similarProduct->image ? asset('storage/' . $similarProduct->image) : 'https://via.placeholder.com/50' }}" alt="{{ $similarProduct->name }}"  class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="font-bold text-lg mb-2">{{ $similarProduct->name }}</h3>
                            <p class="text-gray-600 text-sm mb-2">{{ Str::limit($similarProduct->description, 50) }}</p>
                            <span class="text-blue-600 font-bold">{{ $similarProduct->formattedPrice() }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Commentaires et évaluations -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8">Commentaires et évaluations</h2>

            <!-- Formulaire d'ajout de commentaire -->
            <form action="{{ route('client.reviews.store', $product->id) }}" method="POST" class="mb-12 bg-white p-6 rounded-lg shadow-md animate-on-scroll">
                @csrf
                <h3 class="text-xl font-bold mb-4">Ajouter un commentaire</h3>
                <div class="mb-4">
                    <label for="rating" class="block mb-2">Votre note:</label>
                    <div class="flex text-yellow-400">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star cursor-pointer" data-rating="{{ $i }}"></i>
                        @endfor
                    </div>
                    <input type="hidden" name="rating" id="rating" value="5">
                </div>
                <div class="mb-4">
                    <label for="comment" class="block mb-2">Votre commentaire:</label>
                    <textarea id="comment" name="comment" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600"></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-full hover:bg-blue-700 transition duration-300">Publier le commentaire</button>
            </form>

            <!-- Liste des commentaires -->
            <div class="space-y-6">
                @foreach($product->reviews as $review)
                    <div class="bg-white p-6 rounded-lg shadow-md animate-on-scroll">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <span class="ml-2 text-gray-600">{{ $review->rating }}/5</span>
                        </div>
                        <p class="text-gray-700 mb-2">{{ $review->comment }}</p>
                        <p class="text-gray-500 text-sm">Par {{ $review->user->name }}, le {{ $review->created_at->format('d F Y') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

