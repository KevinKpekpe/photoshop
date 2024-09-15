<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Marque;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'price' => 'nullable|string',
            'category' => 'nullable|exists:categories,id',
            'marque' => 'nullable|exists:marques,id',
            'search' => 'nullable|string|max:255',
        ]);

        $query = Product::query();

        // Filtre par prix
        if (isset($validated['price'])) {
            $price_range = explode('-', $validated['price']);
            if (count($price_range) == 2) {
                $min = $price_range[0];
                $max = $price_range[1];
                $query->whereBetween('price', [$min, $max]);
            } elseif (count($price_range) == 1) {
                $min = $price_range[0];
                $query->where('price', '>=', $min);
            }
        }

        // Filtre par catégorie
        if (isset($validated['category'])) {
            $query->where('category_id', $validated['category']);
        }

        // Filtre par marque
        if (isset($validated['marque'])) {
            $query->where('marque_id', $validated['marque']);
        }

        // Recherche
        if (isset($validated['search'])) {
            $query->where('name', 'like', '%' . $validated['search'] . '%');
        }

        $products = $query->paginate(12);
        $categories = Category::all();
        $marques = Marque::all();

        // Ajoutez la catégorie sélectionnée pour la mettre en évidence dans la vue
        $selectedCategory = isset($validated['category']) ? $validated['category'] : null;

        return view('clients.produits.products', compact('products', 'categories', 'marques', 'selectedCategory'));
    }

    public function show($id)
    {
        $product = Product::with(['category', 'marque', 'reviews.user'])->findOrFail($id);
        return view('clients.produits.product', compact('product'));
    }
}
