<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Device;
/**
 * Class Device
 */
class Profile extends Model
{
    

    protected $table = 'profiles';

    public $timestamps = true;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'cover',
        'dob',
        'gender',
        'picture',
        'user_id',
        'state',
        'city',
        'country_id'
    ];
    
    protected $casts = [
    ];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(Device::class);
    }
}