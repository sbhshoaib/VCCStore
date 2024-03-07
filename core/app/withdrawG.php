<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class withdrawG extends Model
{
    protected $table = 'wgateway';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
