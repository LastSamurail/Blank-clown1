<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**** Relation entre le models user et publication ****/ 
    

    public function departement()
    {
        return $this->belongsTo('App\Models\Departement');
    }

    public function publication()
    {
        return $this->hasMany('App\Models\Publication');
    }

    /*protected static function boot(){
        Parent::boot();
        Static::deleting( function($user) {
            dd($user->publication);
            foreach($user->publication as p){
                $p->delete();
            }
        });
    }*/

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','type','telephone','departement_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
