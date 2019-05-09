<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class joc extends Model
{
    public function biblioteca()
    {
        return $this->belongsTo('App\biblioteca');
    }
}
