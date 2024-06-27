<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function registerForm()
    {
        return view('admins.registerAdmin');
    }
    protected function register(Request  $request)
    {
        $auth = new Admin();
        $auth->nom = $request->input('nom');
        $auth->prenom = $request->input('prenom');
        $auth->email = $request->input('email');
        $auth->password = Hash::make($request->input('password'));
        $auth->save();


        return redirect()->route('admins.loginformAdmin')->with(['success' => 'Inscription réussie!']);
    }
    public function loginForm()
    {
        return view('admins.loginAdmin');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // L'utilisateur est authentifié
            return redirect("/")
                ->with('success', 'Bienvenue! Vous êtes connecté.');
        }

        // Si l'authentification échoue, redirigez vers le formulaire de connexion avec un message d'erreur
        return redirect()->route('admins.loginAdmin')
            ->with('error', 'Adresse e-mail ou mot de passe incorrect.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/");
    } 
    public function indexAllAdmin($id){
        if(auth()->check() && auth()->id==$id){
          $admin=Admin::all() ;
          return view('admins.indexAllAdmin');
        }
    }
}
