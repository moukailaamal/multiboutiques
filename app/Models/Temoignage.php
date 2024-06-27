<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temoignage extends Model
{
    use HasFactory;
    protected $fillable = [
        'avis',
        'client_id',
        'image_path',
        'produit_id',
    ];

    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
