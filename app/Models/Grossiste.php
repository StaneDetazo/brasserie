<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grossiste extends Model
{
    protected $table = 'grossistes';

    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'email',
        'password'
    ];

}
