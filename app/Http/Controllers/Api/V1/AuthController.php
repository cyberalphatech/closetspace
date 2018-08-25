<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Api\V1\SocialLoginRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Api\V1\AuthenticationService;

class AuthController extends Controller
{
    private $authenticateService;

    /**
     * AuthController constructor.
     *
     * @param UserService $userService UserService
     */
    public function __construct(AuthenticationService $authenticateService)
    {
        $this->authenticateService = $authenticateService;
    }

    /**
     * Login by social user
     *
     * @param SocialLoginRequest $socialLoginRequest SocialLoginRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function socialLogin(SocialLoginRequest $socialLoginRequest) {
        try {
            $input = $socialLoginRequest->all();
            $data = $this->authenticateService->processSocialLogin($input);
            return $this->responseSuccess($data);
        } catch (\Exception $ex) {
            dd($ex);
            return $this->responseError('Login fail', Response::HTTP_UNAUTHORIZED);
        }
    }
}
