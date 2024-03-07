<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $table = 'withdraw';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
