<?php

namespace Upanel;

use Illuminate\Database\Eloquent\Model;

class CheckEntry extends Model
{
    protected $fillable = [
        'id_entry',
        'id_item',
        'quantity',
        'price',
    ];

    public $timestamps = false;
}
