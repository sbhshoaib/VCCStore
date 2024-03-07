<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{

    protected $table = 'generals';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
