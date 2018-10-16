<?php

namespace App\Repositories\Api\V1;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Brand;

class BrandRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model() {
        return Brand::class;
    }
}
