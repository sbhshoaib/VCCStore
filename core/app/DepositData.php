<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepositData extends Model
{
    protected $table = 'deposit_data';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
