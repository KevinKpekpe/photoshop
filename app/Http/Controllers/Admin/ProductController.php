<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Marque;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('actif', true)->get();
        $marques = Marque::where('actif', true)->get();
        return view('admin.products.form', compact('categories', 'marques'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:products',
            'title' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'nullable|exists:categories,id',
            'marque_id' => 'nullable|exists:marques,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        Product::create($validatedData);

        return redirect()->route('admin.products.index')->with('success', 'Produit créé avec succès.');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('actif', true)->get();
        $marques = Marque::where('actif', true)->get();
        return view('admin.products.form', compact('product', 'categories', 'marques'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:products,code,' . $product->id,
            'title' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'nullable|exists:categories,id',
            'marque_id' => 'nullable|exists:marques,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validatedData);

        return redirect()->route('admin.products.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy(Product $product)
    {
        $product->update(['actif' => false]);
        return redirect()->route('admin.products.index')->with('success', 'Produit désactivé avec succès.');
    }
}
