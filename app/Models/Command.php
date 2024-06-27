<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;
    protected $fillable = [
        'adresse',
        'numero',
        'client_id',
        'contenue',
        'statut',
    ];

    // Relation avec le modèle Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
