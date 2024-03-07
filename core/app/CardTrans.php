<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardTrans extends Model
{
    protected $table = 'cardtrans';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
