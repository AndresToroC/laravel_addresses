<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Helper\SearchPaginate;

class Address extends Model
{
    use SearchPaginate;
    
    static $search_columns = ['created_at'];

    protected $fillable = [
        'career', 'street', 'description', 'user_id'
    ];
}
