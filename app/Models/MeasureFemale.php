<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasureFemale extends Model
{

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'bshape',
        'bust',
        'bra',
        'waist',
        'hips',
        'measure_unit_id'
    ];
}
