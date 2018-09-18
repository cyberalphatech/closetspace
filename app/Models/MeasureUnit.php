<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MeasureUnit extends Model
{
    protected $fillable = [
        'name',
        'description',
        'value'
    ];

    protected $casts = [
    ];
    
    protected $guarded = [];
}
