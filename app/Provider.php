<?php

namespace Upanel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'id',
        'contact',
        'telephone_contact'
    ];

    public $timestamps = false;

    public function person()
    {
        return $this->hasOne(Person::class, 'id');
    }
}
