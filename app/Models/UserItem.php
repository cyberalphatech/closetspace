<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserItem extends Model
{
    
    protected $fillable = [
        'user_id',
        'catalogue_id',
        'quantity'
    ];
}
