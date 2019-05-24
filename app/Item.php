<?php

namespace Upanel;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        "category_id",
        "code",
        "name",
        "price_sale",
        "stock",
        "description",
        "state",
        "expiration_date",
        "sales_threshold",
        "stock_threshold",
        "expiration_threshold"
    ];

    protected $dates = [
        'expiration_date'
    ];

}
