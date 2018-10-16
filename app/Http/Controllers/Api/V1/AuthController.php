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
     * @OA\Post(
     *   path="/api/v1/login/social",
     *   tags={"Guest"},
     *   description="Guest login by soicial.",
     *   @OA\RequestBody(
     *         description="Social body login",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(ref="#/components/schemas/SocialAuthen")
     *         )
     *     ),
     *   @OA\Response(response="200", description="An example resource", @OA\JsonContent(ref="#/components/schemas/RegisterResponse")),
     *   @OA\Response(response=422, description="Invalid data", @OA\JsonContent(ref="#/components/schemas/ErrorDataReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/ErrorReponse"))
     * )
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

    /**
     * @OA\Post(
     *   path="/api/v1/login",
     *   tags={"Guest"},
     *   description="Guest login by local.",
     *   @OA\RequestBody(
     *         description="local body login",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(ref="#/components/schemas/LocalAuthen")
     *         )
     *     ),
     *   @OA\Response(response="200", description="An example resource", @OA\JsonContent(ref="#/components/schemas/RegisterResponse")),
     *   @OA\Response(response=422, description="Invalid data", @OA\JsonContent(ref="#/components/schemas/ErrorDataReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/ErrorReponse"))
     * )
     */
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

    /**
     * @OA\Get(
     *   path="/api/v1/me/logout",
     *   tags={"User"},
     *   description="User logout.",
     *   @OA\Response(response="200", description="An example resource"),
     *   @OA\Response(response=422, description="Invalid data", @OA\JsonContent(ref="#/components/schemas/ErrorDataReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/ErrorReponse"))
     * )
     */
    public function logout()
    {
        $this->authenticateService->logout();
        return response()->json([
            'message'    => "Logout success!",
        ], 401);
    }
}
