<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Api\Controller;
use App\Http\Requests\Api\V1\SocialLoginRequest;
use App\Http\Requests\Api\V1\LocalLoginRequest;
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
            return $this->responseError('Login fail', Response::HTTP_UNAUTHORIZED);
        }
    }

    public function localLogin(LocalLoginRequest $request)
    {
        try {
            $input = $request->all();
            $data = $this->authenticateService->processLocalLogin($input);
            return $this->responseSuccess($data);
        } catch (\Exception $ex) {
            return $this->responseError('Login fail', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
