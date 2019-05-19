<?php

namespace Upanel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;

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
