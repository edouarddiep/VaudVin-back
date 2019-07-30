<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{

    protected $table = 'app_rates';

    protected $guarded = ['id'];

    protected $fillable = [
        'value',
        'vint_id',
        'user_id',
    ];
}
