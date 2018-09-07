<?php

namespace App\Repositories\Api\V1;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Profile;

class ProfileRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model() {
        return Profile::class;
    }
}
