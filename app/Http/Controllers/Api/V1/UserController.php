<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\Api\V1\UserService;
use App\Services\Api\V1\ItemService;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Api\V1\GetMeasuareTypeRequest;
use  App\Http\Requests\Api\V1\PostMeasureRequest;
use  App\Http\Requests\Api\V1\GetModelRequest;
use  App\Http\Requests\Api\V1\PostUserItemRequest;

class UserController extends Controller
{

    private $userService;

    private $itemService;

    /**
     * AuthController constructor.
     *
     * @param GuestService $userService UserService
     */
    public function __construct(
        UserService $userService,
        ItemService $itemService
    )
    {
        $this->userService = $userService;
        $this->itemService = $itemService;
    }

    public function getMeasureType(GetMeasuareTypeRequest $request)
    {
        $measureTypes = $this->userService->findMeasureTypeByGender($request->get('gender'));
        return $this->responseSuccess($measureTypes);
    }

    public function postMeasure(PostMeasureRequest $request)
    {
        $measure = $this->userService->createMeasure($request);
        return $this->responseSuccess($measure);
    }

    public function getSubCategories()
    {
        $subCat = $this->userService->subcategories();
        return $this->responseSuccessArray($subCat);
    }

    public function getBrands()
    {
        $branchs = $this->userService->getBrands();
        return $this->responseSuccessArray($branchs);
    }

    public function getModels(GetModelRequest $request)
    {
        $models = $this->userService->getModels($request);
        return $this->responseSuccessArray($models);
    }

    public function getColors()
    {
        $colors = $this->userService->getColors();
        return $this->responseSuccessArray($colors);
    }

    public function addItem(PostUserItemRequest $request)
    {
        $userItem = $this->itemService->addItemUser($request);
        return $this->responseSuccess($userItem);
    }
}