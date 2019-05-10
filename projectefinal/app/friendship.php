<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friendship extends Model
{
    protected $fillable = [
        'user1_id','user2_id','active',
    ];

    public function user()
    {
        return $this->belongsTo('App\User','user1_id');
    }
}
