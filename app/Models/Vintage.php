<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class Vintage extends Model
{

    protected $table = 'app_vintages';

    protected $guarded = ['vin_id'];

    protected $primaryKey = 'vin_id';

    protected $fillable = [
        'vin_year',
        'fk_vin_win_id',
    ];
}
