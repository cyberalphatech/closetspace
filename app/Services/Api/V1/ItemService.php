<?php

namespace App\Services\Api\V1;

use App\Repositories\Api\V1\ItemRepository;
use App\Repositories\Api\V1\UserItemRepository;

class ItemService {

    private $itemRepository;

    private $userItemRepository;

    public function __construct(
        ItemRepository $itemRepository,
        UserItemRepository $userItemRepository
    ) {
        $this->itemRepository = $itemRepository;
        $this->userItemRepository = $userItemRepository;
    }

    public function getItems($request)
    {
        $columns = ['items.id', 'items.name', 'items.description'];
        $brandId = $request->get('brand_id');
        $modelId = $request->get('model_id');
        $colorId = $request->get('color_id');
        $items = $this->itemRepository->scopeQuery(function($query) use ($modelId,  $brandId, $colorId) {
            return $query->join('catalogues', 'catalogues.item_id', '=', 'items.id')
                        ->where('items.model_id', $modelId)->where('items.brand_id', $brandId)
                        ->where('items.id', $colorId);
        })->all($columns);
        return $items;
    }

    public function addItemUser($request)
    {
        $data = $request->all();
        $data['user_id'] = 1;
        $userItem = $this->userItemRepository->create($data);
        return $userItem;
    }
}
