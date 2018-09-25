<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\Api\V1\SubCategoryService;
use App\Http\Requests\Api\V1\GetSubCategoryRequest;
use Symfony\Component\HttpFoundation\Response;

class SubCategoryController extends Controller
{
    private $subCategoryService;

    /**
     * AuthController constructor.
     *
     * @param SubCategoryService $subCategoryService SubCategoryService
     */
    public function __construct(SubCategoryService $subCategoryService)
    {
        $this->subCategoryService = $subCategoryService;
    }

    public function index(GetSubCategoryRequest $request)
    {
        $brands = $this->subCategoryService->getSubCategories($request);
        return $this->responseSuccessArray($brands);
    }
}