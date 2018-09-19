<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategoryRelation extends Model
{

    protected $fillable = [
        'category_id',
        'sub_category_id',
    ];
}
