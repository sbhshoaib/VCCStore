<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminNotif extends Model
{
    protected $table = 'adminnotif';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
