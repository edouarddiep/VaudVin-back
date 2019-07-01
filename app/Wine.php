<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{

    protected $guarded = ['id'];

    protected $fillable = [
        'region',
        'name',
        'producer',
        'appellation',
        'grape_variety',
        'vintage',
        'category',
        'style',
        'served_with',
        'sugar_level',
        'total_acidity',
        'alcohol_level',
        'selling_price',
        'is_bio',
        'is_woody_character',
        'is_assembled',
        'capacity',
        'photo',
    ];
}
