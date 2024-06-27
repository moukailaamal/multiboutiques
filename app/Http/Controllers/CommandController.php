<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\Produit;
use App\Notifications\CommandePasseeNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class CommandController extends Controller
{
    public function index($id)
    {
        $command=Command::find($id);
        return  view('commands.indexCommand',['command'=>$command]);

    }

    public function indexContenue($id)
    {
        $command = Command::find($id);
    
        if (!$command) {
            return redirect()->route('commands.index')->with('error', 'Commande non trouvée.');
        }
    
        $contenu = json_decode($command->contenue); 
        return view('commands.contenue', ['contenu' => $contenu]);
    }
    

    public function passCommand(Request $request)
    {
        
        // Validation des données de la requête
        $request->validate([
            'adresse' => 'required|string', 
        ]);
    
        // Récupération du panier depuis la session
        $panier = session()->get('panier');
    
        // Création d'une nouvelle commande
        $commande = new Command();
        $commande->client_id = Auth::id();
        $commande->contenu = json_encode($panier);
        $commande->statut = 'En cours';
        $commande->adresse = $request->input('adresse');
        $commande->save();
      
        foreach ($panier as $id=>$content) {

            $produit = Produit::find($id);
            
            // Assurez-vous que le produit existe avant de manipuler le stock
            if ($produit) {
                $produit->stock =$produit->stock -$content['quantite'];
                $produit->save(); 
            }
        }
        // pour supprimer le panier
        session()->forget('panier');
        // envoiye une notification 
        Auth::user()->notify(new CommandePasseeNotification($commande));

       return redirect()->route('/')->with('success', 'Commande passée avec succès!');
    }

   
    public function payment()
    {
    }
}
