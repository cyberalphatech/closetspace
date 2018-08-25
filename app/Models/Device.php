<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Device
 */
class Device extends Model
{
    const ANDROID = 1;
    
    const IOS = 2;

    protected $table = 'devices';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'uuid',
        'device_type'
    ];
    
    protected $casts = [
    ];
    protected $guarded = [];
        
}