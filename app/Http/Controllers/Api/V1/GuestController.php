<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\Api\V1\GuestService;
use App\Http\Requests\Api\V1\RegisterUserRequest;
use Symfony\Component\HttpFoundation\Response;

class GuestController extends Controller
{
    private $guestService;

    /**
     * AuthController constructor.
     *
     * @param GuestService $userService UserService
     */
    public function __construct(GuestService $guestService)
    {
        $this->guestService = $guestService;
    }

    public function register(RegisterUserRequest $request)
    {
        try {
            $profile = $this->guestService->registerUser($request);
            return $this->responseSuccess($profile);
        } catch(\Exception $e) {
            return $this->responseError('Register fail', Response::HTTP_CREATED);
        }
    }

    public function getGenders() {
        $genders = $this->guestService->findAllGenders();
        return $this->responseSuccess($genders);
    }

    public function getStyles() {
        $styles = $this->guestService->findAllStyles();
        return $this->responseSuccess($styles);
    }
}