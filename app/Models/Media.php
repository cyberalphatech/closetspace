<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
   protected $fillable = [
        'mediaable_type',
        'mediaable_id',
        'url',
    ];
    /**
     * Get all of the owning commentable models.
     */
    public function mediaable()
    {
        return $this->morphTo();
    }
}
