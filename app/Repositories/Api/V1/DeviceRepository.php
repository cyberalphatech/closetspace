<?php

namespace App\Repositories\Api\V1;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\Device;

class DeviceRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model() {
        return Device::class;
    }
}
