<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $fillable = [
        'libelle','titre','categories_id','user_id','departement_pub','fichier','date_publication',
    ];

    /**** Relation entre le models user et publication ****/ 
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function departement()
    {
        return $this->belongsTo('App\Models\Departement');
    }

    public function commentaire()
    {
        return $this->hasMany('App\Models\Commentaire');
    }
}
