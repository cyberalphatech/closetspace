<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\Api\V1\UserService;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Api\V1\GetMeasuareTypeRequest;


class UserController extends Controller
{

    private $userService;

    /**
     * AuthController constructor.
     *
     * @param GuestService $userService UserService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function getMeasureType(GetMeasuareTypeRequest $request)
    {
        $measureTypes = $this->userService->findMeasureTypeByGender($request->get('gender'));
        return $this->responseSuccess($measureTypes);
    }
}