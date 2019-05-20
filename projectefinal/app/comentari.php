<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comentari extends Model
{
    use DatePresenter;
    
    // fields can be filled
    protected $fillable = ['body', 'user_id', 'post_id'];
    
    public function post()
    {
        return $this->belongsTo('App\joc');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
