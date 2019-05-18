<?php

namespace Upanel;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    protected $fillable = [
        'name',
        'lastname',
        'type_doc',
        'num_doc',
        'address',
        'telephone',
        'email'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id');
    }
}
