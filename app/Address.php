<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'career', 'street', 'description', 'user_id'
    ];
}
