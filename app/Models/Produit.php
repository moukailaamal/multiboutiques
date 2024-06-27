<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'description',
        'categorie_id',
        'stock',
        'prix',
        'image_path',
        'vendeur_id',
    ];
     // Relation avec la table `categories`
     public function categorie()
     {
         return $this->belongsTo(Categorie::class);
     }
 
     // Relation avec la table `vendeurs`
     public function vendeur()
     {
         return $this->belongsTo(Vendeur::class);
     }

     public function command()
     {
         return $this->belongsTo(Command::class);
     }
}
