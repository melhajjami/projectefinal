<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comentari extends Model
{
    // use DatePresenter;
    
    // fields can be filled
    protected $fillable = ['comentari', 'user_id', 'post_id'];
    
    public function joc()
    {
        return $this->belongsTo('App\joc','joc_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
