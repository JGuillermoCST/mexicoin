<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    
    protected $fillable = [
        'name',
        'user_id',
        'street',
        'street2',
        'number_ext',
        'number_int',
        'city',
        'state',
        'zip_code',
        'country',
    ];
}
