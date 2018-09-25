<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\Api\V1\ItemService;
use App\Http\Requests\Api\V1\GetItemRequest;
use Symfony\Component\HttpFoundation\Response;

class ItemController extends Controller
{
    private $itemService;

    /**
     * AuthController constructor.
     *
     * @param ItemService $itemService ItemService
     */
    public function __construct(ItemService $itemService)
    {
        $this->itemService = $itemService;
    }

    public function index(GetItemRequest $request)
    {
        $items = $this->itemService->getItems($request);
        return $this->responseSuccessArray($items);
    }
}