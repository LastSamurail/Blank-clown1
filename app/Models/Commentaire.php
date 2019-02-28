<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $fillable = [
        'libelle', 'date_commentaire',
    ];

    public function publication()
    {
        return $this->belongsTo('App\Models\Publication');
    }

     public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
