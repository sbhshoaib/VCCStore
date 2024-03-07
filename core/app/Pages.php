<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{

    protected $table = 'pages';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
