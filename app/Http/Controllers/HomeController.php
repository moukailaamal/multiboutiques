<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Categorie::all();
        $produits = Produit::all();
        return view('home', ['categories' => $categories, 'produits' => $produits]);
    }

    public function ajouterPanier(Request $request)
    {
        $produit = Produit::find($request->id);
        $panier = session()->get('panier', []);

        if (isset($panier[$request->id])) {
            $panier[$request->id]['quantite']++;
        } else {
            $panier[$request->id] = [
                "name" => $produit->name,
                "quantite" => 1,
                "prix-unitaire" => $produit->prix,
                "image" => $produit->image_path
            ];
        }

        session()->put('panier', $panier);
        return response()->json(['message' => 'Le produit a été bien ajouté.']);
    }

    public function augmenterStockPanier($id)
    {
        $panier = session()->get('panier');
        if (isset($panier[$id])) {
            $produit = Produit::find($id);
            $stock = $produit->stock;

            if ($panier[$id]['quantite'] < $stock) {
                $panier[$id]['quantite']++;
            }
        }

        session()->put('panier', $panier);
        return response()->json(['message' => 'La quantité du produit a été augmentée.']);
    }

    public function deminuerPanier($id)
    {
        $panier = session()->get('panier');
        if (isset($panier[$id])) {
            if ($panier[$id]['quantite'] > 1) {
                $panier[$id]['quantite']--;
            } else {
                unset($panier[$id]);
            }
        }

        session()->put('panier', $panier);
        return response()->json(['message' => 'La quantité du produit a été diminuée.']);
    }

    public function destroyPanier($id)
    {
        $panier = session()->get('panier');
        if (isset($panier[$id])) {
            unset($panier[$id]);
        }

        session()->put('panier', $panier);
        return response()->json(['message' => 'Le produit a été supprimé du panier.']);
    }
}
