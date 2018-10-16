<?php

namespace App\Schemas\LocalAuthen;

/**
 * @OA\Schema(required={"quantity", "catalogue_id"},
 *   @OA\Xml(name="Item")
 * )
 */
class Item
{
    /**
     * @OA\Property(description="quantity of item")
     * @var int
     */
    public $quantity;

    /**
     * @OA\Property(description="catalogue id of item")
     * @var int
     */
    public $catalogue_id;
}