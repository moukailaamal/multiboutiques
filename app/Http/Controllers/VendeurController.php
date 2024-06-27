<?php

namespace App\Http\Controllers;

use App\Models\Vendeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class VendeurController extends Controller
{
    public function registerForm()
    {
        return view('vendeurs.registerVendeur');
    }
    public function register(Request $request)
    {
      

        $vendeur = new Vendeur();
        $vendeur->nom = $request->input('nom');
        $vendeur->prenom = $request->input('prenom');
        $vendeur->adresse = $request->input('adresse');
        $vendeur->nom_boutique = $request->input('nom_boutique');
        $vendeur->ouverture = $request->input('ouverture');
        $vendeur->fermeture = $request->input('fermeture');
        $vendeur->email = $request->input('email');
        $vendeur->password = Hash::make($request->input('password'));
        $vendeur->save();

        return redirect()->route('vendeurs.loginForm')->with(['success' => 'Inscription réussie!']);
    }
    public function loginForm()
    {
        return view('vendeurs.loginVendeur');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('vendeur')->attempt($credentials)) {
            // L'utilisateur est authentifié
            return redirect("/")
                ->with('success', 'Bienvenue! Vous êtes connecté.');
        }

        // Si l'authentification échoue, redirigez vers le formulaire de connexion avec un message d'erreur
        return redirect()->route('vendeurs.loginVendeur')
            ->with('error', 'Adresse e-mail ou mot de passe incorrect.');
    }

    public function logout()
    {
        Auth::guard('vendeur')->logout();
        return redirect("/");
    } 
    public function forgetPassWord()
    {
        
    } 
}
