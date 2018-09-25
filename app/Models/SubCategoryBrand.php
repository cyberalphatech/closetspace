<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategoryBrand extends Model
{
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
