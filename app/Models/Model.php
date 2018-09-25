<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function images()
    {
        return $this->morphMany(Media::class, 'mediaable');
    }
}
