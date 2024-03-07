<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loginpage extends Model
{

    protected $table = 'loginpage';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
