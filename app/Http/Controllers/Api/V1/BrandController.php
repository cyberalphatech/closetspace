<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\Api\V1\BrandService;
use App\Http\Requests\Api\V1\GetBrandRequest;
use Symfony\Component\HttpFoundation\Response;

class BrandController extends Controller
{
    private $brandService;

    /**
     * AuthController constructor.
     *
     * @param BrandService $itemService ItemService
     */
    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    /**
     * @OA\Get(
     *   path="/api/v1/brands",
     *   tags={"Guest"},
     *   description="Get list brands.",
     *   security={{"bearer": {}}, },
     *   @OA\Parameter(
     *         name="sub_category_id",
     *         in="query",
     *         description="sub category id to filter by",
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *   @OA\Response(response="200", description="An example resource"),
     *   @OA\Response(response=422, description="Invalid data", @OA\JsonContent(ref="#/components/schemas/ErrorDataReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/ErrorReponse"))
     * )
     */
    public function index(GetBrandRequest $request)
    {
        $brands = $this->brandService->getBrands($request);
        return $this->responseSuccessArray($brands);
    }
}