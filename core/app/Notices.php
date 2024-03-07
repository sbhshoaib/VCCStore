<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notices extends Model
{

    protected $table = 'notices';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
