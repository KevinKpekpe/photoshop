<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%")
                             ->orWhere('postnom', 'like', "%{$search}%")
                             ->orWhere('prenom', 'like', "%{$search}%");
            })
            ->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $user = new User();
        dd($user);
        return view('admin.users.form', compact('user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'postnom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:Homme,Femme',
            'date_naissance' => 'required|date',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'code_postal' => 'required|string|max:10',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Client,Admin',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    public function edit(User $user)
    {
        return view('admin.users.form', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'postnom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:Homme,Femme',
            'date_naissance' => 'required|date',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'code_postal' => 'required|string|max:10',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => 'required|in:Client,Admin',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $validatedData['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $user->update($validatedData);

        return redirect()->route('admin.users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy(User $user)
    {
        if ($user->photo) {
            Storage::disk('public')->delete($user->photo);
        }
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function toggleActive(User $user)
    {
        $user->update(['active' => !$user->active]);
        return redirect()->route('admin.users.index')->with('success', 'Statut de l\'utilisateur mis à jour.');
    }

    public function resetPassword(User $user)
    {
        $newPassword = str_random(10);
        $user->update(['password' => Hash::make($newPassword)]);

        // Ici, vous devriez envoyer un e-mail à l'utilisateur avec son nouveau mot de passe
        // Mail::to($user->email)->send(new PasswordReset($newPassword));

        return redirect()->route('admin.users.index')->with('success', 'Mot de passe réinitialisé et envoyé à l\'utilisateur.');
    }
}
