<?php

namespace Upanel;

use Illuminate\Database\Eloquent\Model;

class CheckSale extends Model
{
    protected $fillable = [
        'id_sale',
        'id_item',
        'quantity',
        'price',
        'discount',
        
    ];

    public $timestamps = false;
}
