<?php

namespace App\Repositories\Api\V1;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\MeasureType;

class MeasureTypeRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model() {
        return MeasureType::class;
    }
}
