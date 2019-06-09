<?php

namespace Upanel;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;
    protected $fillable = [
        "category_id",
        "code",
        "name",
        "price_sale",
        "stock",
        "description",
        "state",
        "expiration_date",
        "stock_threshold",
        "expiration_threshold"
    ];

    protected $dates = [
        'expiration_date'
    ];

    public function getExpirationDateStringAttribute()
    {
        return Carbon::parse($this->attributes['expiration_date'])->format('Y-m-d');
    }

}
