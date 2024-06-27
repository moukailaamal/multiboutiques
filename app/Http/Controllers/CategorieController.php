<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    // afficher les categories
    public function index(){
        $categories = Categorie::all();
        return view('categories.index', ['categories' => $categories]);
    }
    public function create(){
        return view('categories.create');
    }
    public function store(Request $request) {
        try {
            $categorie = new Categorie();  
            $categorie->nom = $request->input('nom');
            $categorie->save();
            return redirect()->route('categories.index')->with('success', 'Félicitations ! La catégorie est bien ajoutée');
        } catch (\Exception $e) {  
            return redirect()->route('categories.create')
                ->with('error', 'Erreur ! La catégorie n\'a pas pu être créée.');
        }
    }
   // modifier les categories
   public function edit($id){
    $categorie=Categorie::find($id);
    return view('categories.update', ['categorie' => $categorie]);
}
public function update(Request $request,$id) {
    
        $categorie = Categorie::find($id);
        $categorie->nom = $request->input('nom');
        $categorie->save();
        return redirect()->route('categories.index')->with('success', 'Félicitations ! La catégorie est bien modifiee');
    
} 

// supprime les categories
public function destroy($id){
    try {
        $categorie = Categorie::find($id);
        if ($categorie) {
            Produit::where('categorie_id', $id)->delete();
            $categorie->delete();
            return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès.');
        } else {
            return redirect()->route('categories.index')->with('error', 'Catégorie non trouvée.');
        }
    } catch (\Exception $e) {
        return redirect()->route('categories.index')->with('error', 'Erreur lors de la suppression de la catégorie : ' . $e->getMessage());
    }
}

}
