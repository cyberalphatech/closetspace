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

    public function index(GetBrandRequest $request)
    {
        $brands = $this->brandService->getBrands($request);
        return $this->responseSuccessArray($brands);
    }
}