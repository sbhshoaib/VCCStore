<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithdrawData extends Model
{
    protected $table = 'withdraw_data';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
