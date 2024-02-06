<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commandes extends Model
{
    use HasFactory;
    protected $table = 'commandes'; // Si le nom de la table est différent du nom du modèle
    protected $primaryKey = 'id_commande'; // Nom de la clé primaire
    protected $fillable = [
        'id_commande',
        'produit_commande',
        'total_commande',
        'quantite_commande',
        'created_at',
        'updated_at',
    ];
}
