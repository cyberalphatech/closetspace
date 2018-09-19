<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'image'
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
