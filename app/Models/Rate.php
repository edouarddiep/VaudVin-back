<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{

    protected $table = 'app_rates';
    protected $guarded = ['rat_id'];
    protected $primaryKey = 'rat_id';
    protected $fillable = [
        'rat_value',
        'rat_comment',
        'fk_rat_vin_id',
        'fk_rat_user_id',
    ];
}
