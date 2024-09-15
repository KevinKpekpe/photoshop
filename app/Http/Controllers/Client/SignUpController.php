<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\VerifyEmail;
use Illuminate\Support\Facades\Storage;

class SignUpController extends Controller
{
    public function showSignupForm()
    {
        return view('clients.auth.signup');
    }

    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'postnom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'sexe' => 'required|in:M,F',
            'date_naissance' => 'required|date',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'code_postal' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $userData = $request->except('photo', 'password');
        $userData['password'] = Hash::make($request->password);
        $userData['email_verification_token'] = Str::random(60);

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->store('profile_photos', 'public');
            $userData['photo'] = $imagePath;
        }

        $user = User::create($userData);

        // Générer l'URL de vérification
        $verificationUrl = url("/verify-email/{$user->email_verification_token}");

        // Envoyer l'email avec l'URL de vérification
        Mail::to($user->email)->send(new VerifyEmail($user, $verificationUrl));

        return view('clients.auth.verify-email')->with('email', $user->email);
    }

    public function verifyEmail($token)
    {
        $user = User::where('email_verification_token', $token)->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Token de vérification invalide.');
        }

        $user->email_verified_at = now();
        $user->email_verification_token = null;
        $user->save();

        return redirect()->route('login')->with('success', 'Votre email a été vérifié. Vous pouvez maintenant vous connecter.');
    }

    public function resendVerificationEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Utilisateur non trouvé.');
        }

        if ($user->email_verified_at) {
            return back()->with('info', 'Email déjà vérifié.');
        }

        // Régénérer le token si nécessaire
        if (!$user->email_verification_token) {
            $user->email_verification_token = Str::random(60);
            $user->save();
        }

        // Générer l'URL de vérification
        $verificationUrl = url("/verify-email/{$user->email_verification_token}");

        // Envoyer l'email avec l'URL de vérification
        Mail::to($user->email)->send(new VerifyEmail($user, $verificationUrl));

        return back()->with('success', 'Email de vérification renvoyé.');
    }
}
