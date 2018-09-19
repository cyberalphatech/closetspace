<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasureMale extends Model
{
    const TYPE = 1;

    protected $fillable = [
         'user_id',
        'bshape',
        'neck',
        'chest',
        'sleeve',
        'waist',
        'hips',
        'inseam',
        'measure_unit_id'
    ];
}
