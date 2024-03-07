<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardRequest extends Model
{
    protected $table = 'card_request';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
