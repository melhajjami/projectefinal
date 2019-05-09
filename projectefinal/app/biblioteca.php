<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class biblioteca extends Model
{
    protected $fillable = ['id_usuari','id_joc','tempsjugat'];

    public function usuari()
    {
        return $this->belongsTo('App\User','id_usuari');
    }

    public function jocs()
    {
        return $this->hasMany('App\joc','id_joc');
    }
}
