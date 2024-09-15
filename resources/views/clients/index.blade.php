@extends('clients.base')
@section('content')
    <!-- Hero Section -->
    <section class="relative bg-cover bg-center h-screen flex items-center" style="background-image: url('https://images.unsplash.com/photo-1452587925148-ce544e77e70d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="container mx-auto px-4 z-10">
            <div class="max-w-3xl">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-4">Capturez l'Extraordinaire</h1>
                <p class="text-xl text-gray-200 mb-8">Découvrez notre sélection d'équipements photographiques de pointe pour donner vie à votre vision créative.</p>
                <a href="{{route('product.all')}}" class="bg-blue-600 text-white py-3 px-8 rounded-full text-lg font-semibold hover:bg-blue-700 transition duration-300 inline-block">Explorer les produits</a>
            </div>
        </div>
    </section>

 <!-- Categories Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Nos Catégories</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($categories as $category)
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('storage/' . $category->photo) }}" alt="{{ $category->name }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-xl mb-2">{{ $category->name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $category->description }}</p>
                    <a href="{{ route('product.all', ['category' => $category->id]) }}" class="text-blue-600 hover:text-blue-800 font-semibold">Découvrir →</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Meilleures Ventes Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Meilleures Ventes</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach ($products as $product)
            <div class="bg-white rounded-lg overflow-hidden shadow-md transition-all duration-300 hover:shadow-xl">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/50' }}" alt="{{ $product->title }}" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="font-bold text-lg mb-2">{{$product->title}}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ $product->shortDescription(55) }}</p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-gray-800 font-bold">{{ $product->formattedPrice() }}</span>
                    </div>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-full text-sm hover:bg-blue-700 transition duration-300">
                            Ajouter au panier
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
    <!-- Promotions Section -->
    <section class="py-20 bg-blue-600">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-white mb-12">Offres Spéciales</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=764&q=80" alt="Promotion" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-2">Promotion d'Été</h3>
                        <p class="text-gray-600 mb-4">Profitez de 20% de réduction sur tous les objectifs.</p>
                        <a href="#" class="bg-blue-600 text-white py-2 px-6 rounded-full inline-block hover:bg-blue-700 transition duration-300">En savoir plus</a>
                    </div>
                </div>
                <!-- Répétez pour les autres promotions -->
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-bold mb-4">Restez Informé</h2>
                <p class="text-gray-600 mb-8">Inscrivez-vous à notre newsletter pour recevoir les dernières offres et actualités.</p>
                <form class="flex flex-col md:flex-row gap-4">
                    <input type="email" placeholder="Votre adresse email" class="flex-grow py-3 px-4 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600">
                    <button type="submit" class="bg-blue-600 text-white py-3 px-8 rounded-full hover:bg-blue-700 transition duration-300">S'inscrire</button>
                </form>
            </div>
        </div>
    </section>
@endsection
