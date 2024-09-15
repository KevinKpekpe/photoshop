<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Notifications\PasswordChanged;

class PasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('clients.dashboard.change_password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed|different:current_password',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        // Vérification supplémentaire que le nouveau mot de passe est différent de l'ancien
        if (Hash::check($request->new_password, $user->password)) {
            return back()->withErrors(['new_password' => 'Le nouveau mot de passe doit être différent de l\'ancien.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        // Envoyer un e-mail de confirmation
        $user->notify(new PasswordChanged());

        return redirect()->route('changePassword')->with('success', 'Votre mot de passe a été changé avec succès.');
    }
}
