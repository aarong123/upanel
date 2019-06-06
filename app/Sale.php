<?php

namespace Upanel;

use Illuminate\Database\Eloquent\Model;


class Sale extends Model
{
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

        public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

}
