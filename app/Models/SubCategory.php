<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'gender',
        'style',
        'picture'
    ];
}
