<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardBinNumber extends Model
{
    protected $table = 'card_bin_numbers';

    protected $fillable = [
        'number',
        'type',
    ];

    // If you have any relationships, define them here
}
