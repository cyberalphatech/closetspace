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

    /**
     * @OA\Get(
     *   path="/api/v1/items",
     *   tags={"Guest"},
     *   description="Get list brands.",
     *   @OA\Parameter(
     *         name="model_id",
     *         in="query",
     *         description="model id to filter by",
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="brand_id",
     *         in="query",
     *         description="brand id to filter by",
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *    @OA\Parameter(
     *         name="color_id",
     *         in="query",
     *         description="color id to filter by",
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *    ),
     *   @OA\Response(response="200", description="An example resource"),
     *   @OA\Response(response=422, description="Invalid data", @OA\JsonContent(ref="#/components/schemas/ErrorDataReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/ErrorReponse"))
     * )
     */
    public function index(GetItemRequest $request)
    {
        $items = $this->itemService->getItems($request);
        return $this->responseSuccessArray($items);
    }
}