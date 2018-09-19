<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasureMale extends Model
{
    public $timestamps = true;

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
