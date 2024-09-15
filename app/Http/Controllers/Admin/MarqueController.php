<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function index()
    {
        $marques = Marque::all();
        return view('admin.marques.index', compact('marques'));
    }

    public function create()
    {
        return view('admin.marques.form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:marques',
            'name' => 'required',
            'description' => 'nullable',
        ]);

        Marque::create($validatedData);

        return redirect()->route('admin.marques.index')->with('success', 'Marque créée avec succès.');
    }

    public function edit(Marque $marque)
    {
        return view('admin.marques.form', compact('marque'));
    }

    public function update(Request $request, Marque $marque)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:marques,code,' . $marque->id,
            'name' => 'required',
            'description' => 'nullable',
        ]);

        $marque->update($validatedData);

        return redirect()->route('admin.marques.index')->with('success', 'Marque mise à jour avec succès.');
    }

    public function destroy(Marque $marque)
    {
        $marque->update(['actif' => false]);
        return redirect()->route('admin.marques.index')->with('success', 'Marque désactivée avec succès.');
    }
}
