<?php

namespace App\Services\Api\V1;

use App\Repositories\Api\V1\ItemRepository;

class ItemService {

    private $itemRepository;

    public function __construct(
        ItemRepository $itemRepository
    ) {
        $this->itemRepository = $itemRepository;
    }

    public function getItems($request)
    {
        $columns = ['items.id', 'items.name', 'items.description'];
        $brandId = $request->get('brand_id');
        $modelId = $request->get('model_id');
        $colorId = $request->get('color_id');
        $items = $this->itemRepository->scopeQuery(function($query) use ($modelId,  $brandId, $colorId) {
            return $query->join('item_colors', 'item_colors.item_id', '=', 'items.id')
                        ->where('items.model_id', $modelId)->where('items.brand_id', $brandId)
                        ->where('items.id', $colorId);
        })->all($columns);
        return $items;
    }
}
