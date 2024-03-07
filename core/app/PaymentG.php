<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentG extends Model
{
    protected $table = 'gateway';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
