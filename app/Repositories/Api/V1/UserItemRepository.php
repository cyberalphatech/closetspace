<?php

namespace App\Repositories\Api\V1;

use App\Models\UserItem;
use Prettus\Repository\Eloquent\BaseRepository;

class UserItemRepository extends BaseRepository
{
    
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return UserItem::class;
    }
}
