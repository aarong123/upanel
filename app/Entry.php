<?php

namespace Upanel;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = [
        'provider_id',
        'user_id',
        'type_voucher',
        'num_voucher',
        'series_voucher',
        'tax',
        'total',
        'state',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
