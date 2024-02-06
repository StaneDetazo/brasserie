<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $table = 'categories';

    protected $primaryKey = 'id_categorie';

    public $incrementing = 'true';

    public $timestamps = 'true';

    protected $fillable = [
        'id_categorie',
        'nom_categorie',
        'created_at',
        'updated_at',
    ];
}
