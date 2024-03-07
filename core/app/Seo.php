<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{

    protected $table = 'seo';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo('App\User');
    }


}
