<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'type',
        'address_1',
        'address_2',
        'address_3',
        'zip_code',
        'city',
        'country',
        'phone_number',
    ];
}
