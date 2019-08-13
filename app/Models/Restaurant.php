<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $guarded = ['res_id'];

    protected $primaryKey = 'res_id';

    protected $fillable = [
        'res_name',
        'res_type',
        'res_address_1',
        'res_address_2',
        'res_address_3',
        'res_zip_code',
        'res_city',
        'res_country',
        'res_phone_number',
    ];
}
