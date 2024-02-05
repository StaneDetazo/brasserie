<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    public $table = 'produits';

    protected $primaryKey = 'id_produit';

    public $incrementing = 'true';

    public $timestamps = 'true';

    protected $fillable = [
        'id_produit',
        'libelle_produit',
        'prix_produit',
        'image',
        'categorie_produit',
        'stock_produit',
        'stock_critique',
        'created_at',
        'updated_at',
    ];
}
