<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
	// les informations requises avant l'enregistrement dans la table Catégorie
   protected $fillable = [
        'libelle',
    ];
}
