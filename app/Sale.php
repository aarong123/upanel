<?php

namespace Upanel;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Sale extends Model
{
        use SoftDeletes;
    protected $fillable = [
    	
        "id_client",
        "id_user",
        "type_voucher",
        "series_voucher",
        "num_voucher",
        "tax",
        "total",
        "state"

    ];

}
