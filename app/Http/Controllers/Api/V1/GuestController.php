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

    /**
     * @OA\Post(
     *   path="/api/v1/register",
     *   tags={"Guest"},
     *   description="Guest register.",
     *   @OA\RequestBody(
     *         description="Guest body register",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(ref="#/components/schemas/Register")
     *         )
     *     ),
     *   @OA\Response(response="200", description="An example resource", @OA\JsonContent(ref="#/components/schemas/RegisterResponse")),
     *   @OA\Response(response=422, description="Invalid data", @OA\JsonContent(ref="#/components/schemas/ErrorDataReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/ErrorReponse"))
     * )
     */
    public function register(RegisterUserRequest $request)
    {
        try {
            $profile = $this->guestService->registerUser($request);
            return $this->responseSuccess($profile);
        } catch(\Exception $e) {
            return $this->responseError('Register fail', Response::HTTP_CREATED);
        }
    }

    /**
     * @OA\Get(
     *   path="/api/v1/genders",
     *   tags={"Guest"},
     *   description="Get list genders.",
     *   @OA\Response(response="200", description="An example resource"),
     *   @OA\Response(response=400, description="Bad request", @OA\Schema(ref="#/components/schemas/ErrorReponse"))
     * )
     */
    public function getGenders() {
        $genders = $this->guestService->findAllGenders();
        return $this->responseSuccessArray($genders);
    }

    /**
     * @OA\Get(
     *   path="/api/v1/styles",
     *   tags={"User"},
     *   description="Get list styles.",
     *   security={{"bearer": {}}, },
     *   @OA\Response(response="200", description="An example resource"),
     *   @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent(ref="#/components/schemas/ErrorReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\Schema(ref="#/components/schemas/ErrorReponse"))
     * )
     */
    public function getStyles() {
        $styles = $this->guestService->findAllStyles();
        return $this->responseSuccessArray($styles);
    }

    /**
     * @OA\Get(
     *   path="/api/v1/categories",
     *   tags={"User"},
     *   description="Get list categories.",
     *   security={{"bearer": {}}, },
     *   @OA\Response(response="200", description="An example resource"),
     *   @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent(ref="#/components/schemas/ErrorReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\Schema(ref="#/components/schemas/ErrorReponse"))
     * )
     */
    public function getCategories() {
        $styles = $this->guestService->findAllCategories();
        return $this->responseSuccessArray($styles);
    }
}