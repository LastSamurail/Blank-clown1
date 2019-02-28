<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
        // les informations requises avant l'enregistrement dans la table Departement

    protected $fillable = [
        'libelle',
    ];

/****** Relations entre le moderateur et le departement ****/

    /* 'App\Models\User','departement_id','user_id','id','id'*/
    

    public function publications()
    {
    return $this->hasMany('App\Models\Publication','departement_pub');
    }

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function moderateurs()
    {
        return $this->hasMany('App\Models\Moderateur');
    }
}
