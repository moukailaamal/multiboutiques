<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class ProduitController extends Controller
{
     // afficher les livre
     public function index()
     {
         $produits = produit::all();
         return view('produits.index', ['produits' => $produits]);
     }
     
 
     public function create()
     {
         $categories = Categorie::all();
         return view('produits.create', ['categories' => $categories]);
     }
     
     public function store(Request $request)
     {
         try {
             $produit = new Produit();
             $produit->nom = $request->input('nom');
             $produit->description = $request->input('description');
             $produit->categorie_id = $request->input('categorie_id');
             $produit->stock = $request->input('stock');
             $produit->prix = $request->input('prix');
             
             $produit->vendeur_id = Auth::guard('vendeur')->id();
     
             if ($request->hasFile('image')) {
                 $path = $request->file('image')->store('public/produits');
                 $produit->image_path = str_replace('public/', 'storage/', $path);
             }
     
             $produit->save();
     
             return redirect()->route('produits.index')->with('success', 'Félicitations ! Le produit a bien été ajouté.');
         } catch (\Exception $e) {
             Log::error($e->getMessage());
             return redirect()->route('produits.create')
                 ->with('error', 'Erreur ! Le produit n\'a pas pu être créé.');
         }
     }
     // modifier les produit
     public function edit ($id)
     {
         $produit = produit::find($id);
         $categories = Categorie::all();
         return view('produits.update', ['produit' => $produit,'categories' => $categories]);
     }
     public function update(Request $request, $id)
     {
         try {
             $produit = produit::find($id);
             $produit->nom = $request->input('nom');
             $produit->description = $request->input('description');
             $produit->categorie_id = $request->input('categorie_id');
             $produit->stock = $request->input('stock');
             $produit->prix = $request->input('prix');

 
             if ($request->hasFile('image')) {
                 $path = $request->file('image')->store('public/produits');
                 $produit->image_path = str_replace('public/', 'storage/', $path);
             }
     
             $produit->save();
             return redirect()->route('produits.index')->with('success', 'Félicitations ! La produit est bien modifiee');
         } catch (\Exception $e) {
             // En cas d'erreur lors de la création de la produit
             return redirect()->route('produits.edit')
                 ->with('error', 'Erreur ! La produit n\'a pas pu être modifiée.');
         }
     }
 
     // supprime les produit
     public function destroy($id)
     {
         try {
             $produit = produit::find($id);
             if ($produit) {
                 $produit->delete();
                 return redirect()->route('produits.index')->with('success', 'Produit supprimée avec succès.');
             } else {
                 return redirect()->route('produits.index')->with('error', 'Produit non trouvée.');
             }
         } catch (\Exception $e) {
             return redirect()->route('produits.index')->with('error', 'Erreur lors de la suppression de la catégorie : ' . $e->getMessage());
         }
     }
}
