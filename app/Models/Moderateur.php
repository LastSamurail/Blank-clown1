<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moderateur extends Model
{
   /**** Relation entre le models moderateur et publication ****/ 
    public function valide()
    {
        return $this->hasMany('App\Models\Publication','departement_pub','user_id');
    }

    public function departement()
    {
        return $this->belongsTo('App\Models\Departement','App\Models\Publication');
    }

    public function departement()
    {
        return $this->hasManyThrough('App\Models\Departement');
    }

    public function publication()
    {
       return $this->hasMany('App\Models\Publication'); 
    } 
}
