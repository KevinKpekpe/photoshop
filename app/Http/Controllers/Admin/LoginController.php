<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function doLogin(Request $request ){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role === 'Admin') {
                return redirect()->intended('admin/');
            }
            Auth::logout();
            return redirect()->back()->withErrors(['email' => 'Access Refusé.']);
        }

        return redirect()->back()->withErrors(['email' => 'Données invalides.']);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
