<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{

    protected $guarded = ['win_id'];

    protected $primaryKey = 'win_id';

    protected $fillable = [
        'win_region',
        'win_name',
        'win_producer',
        'win_appellation',
        'win_grape_variety',
        'win_vintage',
        'win_category',
        'win_style',
        'win_served_with',
        'win_sugar_level',
        'win_total_acidity',
        'win_alcohol_level',
        'win_selling_price',
        'win_is_bio',
        'win_is_woody_character',
        'win_is_assembled',
        'win_capacity',
    ];
}
