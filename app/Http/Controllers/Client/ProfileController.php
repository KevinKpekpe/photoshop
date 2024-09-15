<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('clients.dashboard.mon-profil', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('clients.dashboard.modifier-profil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validationRules = [
            'name' => 'required|string|max:255',
            'postnom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:F,M,Autre',
            'date_naissance' => 'required|date',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'code_postal' => 'required|string|max:10',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ];

        // Ajouter la validation de la photo seulement si une nouvelle photo est téléchargée
        if ($request->hasFile('photo')) {
            $validationRules['photo'] = 'image|max:2048'; // 2MB Max
        }

        $request->validate($validationRules);

        $user->name = $request->name;
        $user->postnom = $request->postnom;
        $user->prenom = $request->prenom;
        $user->sexe = $request->sexe;
        $user->date_naissance = $request->date_naissance;
        $user->adresse = $request->adresse;
        $user->telephone = $request->telephone;
        $user->code_postal = $request->code_postal;
        $user->email = $request->email;

        // Traiter la photo seulement si une nouvelle photo est téléchargée
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($user->photo) {
                Storage::delete('public/profile_photos/' . $user->photo);
            }

            $photoPath = $request->file('photo')->store('public/profile_photos');
            $user->photo = basename($photoPath);
        }

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Profil mis à jour avec succès.');
    }
}
