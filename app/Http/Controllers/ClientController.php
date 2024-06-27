<?php

namespace App\Http\Controllers;


use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function registerForm()
    {
        return view('clients.registerClient');
    }

    protected function register(Request $request)
    {
        $client = new Client();
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->numero = $request->input('numero');
        $client->email = $request->input('email');
        $client->password = Hash::make($request->input('password'));
        $client->save();

        return redirect()->route('clients.loginForm')->with(['success' => 'Inscription réussie!']);
    }

    public function loginForm()
    {
        return view('clients.loginClient');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::guard('client')->attempt($credentials)) {
            // L'utilisateur est authentifié
            return redirect("/")
                ->with('success', 'Bienvenue! Vous êtes connecté.');
        }
    
        // Si l'authentification échoue, redirigez vers le formulaire de connexion avec un message d'erreur
        return redirect()->route('clients.loginForm')
            ->with('error', 'Adresse e-mail ou mot de passe incorrect.');
    }
    


    public function logout()
    {
        Auth::guard('client')->logout();
    return redirect('/');
    }

    public function forgetPassWord()
    {
        // Implémentation de la fonctionnalité de mot de passe oublié
    }
}
