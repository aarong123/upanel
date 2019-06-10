<?php

namespace Upanel;

use Illuminate\Database\Eloquent\Model;


class Sale extends Model
{
    protected $fillable = [
        "id_client",
        "id_user",
        "tax",
        "total",
        "state"
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'id_client');
    }

}
