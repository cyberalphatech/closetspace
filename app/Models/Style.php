<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $table = 'styles';

    public $timestamps = true;

    protected $fillable = [
        'name'
    ];
}
