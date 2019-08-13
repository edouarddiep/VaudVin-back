<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class ConcoursRate extends Model
{

    protected $table = 'app_concours_rates';

    protected $guarded = ['con_rat_id'];

    protected $primaryKey = 'con_rat_id';

    protected $fillable = [
        'con_rat_value',
        'fk_con_rat_vin_id',
    ];
}
