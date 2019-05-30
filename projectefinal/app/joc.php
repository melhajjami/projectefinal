<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class joc extends Model
{
    protected $fillable = [
        'identificador','nom','img','descripcio','preu','puntuacio'
    ];
    public function biblioteca()
    {
        return $this->belongsTo('App\biblioteca');
    }

    public function comentari()
    {
        return $this->hasMany('App\comentari');
    }

}
