<?php

namespace App\Http\Controllers;

use App\Models\Temoignage;
use Illuminate\Http\Request;

class TemoignageController extends Controller
{
    public function indexTemoignage($id){
        $temoignage=Temoignage::find($id);
        view('temoignages.index',['temoignages'=>$temoignage]);

    }
    public function storeTemoignage(Request $request){
        try {
            $temoignage = new Temoignage();  
            $temoignage->avis = $request->input('avis');
            $temoignage->client_id = $request->input('client_id');
            $temoignage->produit_id = $request->input('produit_id');
            $temoignage->image_path = $request->input('image_path');
            $temoignage->save();
            return redirect()->route('temoignages.index')->with('success', 'Félicitations ! La temoignages est bien ajoutée');
        } catch (\Exception $e) {  
            return redirect()->route('temoignages.create')
                ->with('error', 'Erreur ! La temoignages n\'a pas pu être créée.');
        }
    }
    public function destroyTemoignage($id){
        try {
            $temoignage=Temoignage::find($id);
            if($temoignage){
                $temoignage->delete();
                return redirect()->route('temoignages.index')->with('success', 'temoignages supprimée avec succès.');
            } else {
                return redirect()->route('temoignages.index')->with('error', 'temoignages non trouvée.');
            }
        } catch (\Exception $e) {
            return redirect()->route('temoignages.index')->with('error', 'Erreur lors de la suppression de la catégorie : ' . $e->getMessage());
        }
    } 
     
}
