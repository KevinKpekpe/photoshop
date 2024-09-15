<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:categories',
            'name' => 'required',
            'description' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('categories', 'public');
            $validatedData['photo'] = $photoPath;
        }

        Category::create($validatedData);

        return redirect()->route('admin.categories.index')->with('success', 'Catégorie créée avec succès.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.form', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:categories,code,' . $category->id,
            'name' => 'required',
            'description' => 'nullable',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($category->photo) {
                Storage::disk('public')->delete($category->photo);
            }
            $photoPath = $request->file('photo')->store('categories', 'public');
            $validatedData['photo'] = $photoPath;
        }

        $category->update($validatedData);

        return redirect()->route('admin.categories.index')->with('success', 'Catégorie mise à jour avec succès.');
    }

    public function destroy(Category $category)
    {
        $category->update(['actif' => false]);
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie désactivée avec succès.');
    }

    public function activate(Category $category)
    {
        $category->update(['actif' => true]);
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie réactivée avec succès.');
    }
}
