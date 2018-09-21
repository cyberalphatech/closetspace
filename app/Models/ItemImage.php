<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
   protected $fillable = [
        'item_id',
        'picture',
    ]; 

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
