<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = $this->calculateTotal($cart);
        return view('clients.cart.index', compact('cart', 'total'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        // Vérifier si le produit existe déjà dans le panier
        if (isset($cart[$id])) {
            return redirect()->back()->with('error', 'Ce produit est déjà dans votre panier. Vous pouvez modifier la quantité directement dans le panier.');
        }

        // Vérifier le stock disponible
        $requestedQuantity = $request->quantity;
        if ($requestedQuantity > $product->stock) {
            return redirect()->back()->with('error', 'La quantité demandée dépasse le stock disponible. Stock actuel : ' . $product->stock);
        }

        // Ajouter le produit au panier
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => $requestedQuantity,
            "price" => $product->price,
            "image" => $product->image,
            "stock" => $product->stock // Ajouter le stock disponible dans les informations du panier
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produit ajouté au panier avec succès!');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $product = Product::findOrFail($request->id);

            // Vérifier le stock disponible
            if ($request->quantity > $product->stock) {
                return redirect()->back()->with('error', 'La quantité demandée dépasse le stock disponible. Stock actuel : ' . $product->stock);
            }

            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Panier mis à jour avec succès!');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Produit supprimé du panier avec succès!');
        }
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Panier vidé avec succès!');
    }

    private function calculateTotal($cart)
    {
        $total = 0;
        foreach($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}
