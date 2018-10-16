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
use  App\Http\Requests\Api\V1\ChangePasswordRequest;

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

    /**
     * @OA\Get(
     *   path="/api/v1/mesure-types",
     *   tags={"User"},
     *   description="Get list mesure types.",
     *   @OA\Parameter(
     *         name="gender",
     *         in="query",
     *         description="gender to filter by",
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *   @OA\Response(response="200", description="An example resource"),
     *   @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent(ref="#/components/schemas/ErrorReponse")),
     *   @OA\Response(response=422, description="Invalid data", @OA\JsonContent(ref="#/components/schemas/ErrorReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/ErrorReponse"))
     * )
     */
    public function getMeasureType(GetMeasuareTypeRequest $request)
    {
        $measureTypes = $this->userService->findMeasureTypeByGender($request->get('gender'));
        return $this->responseSuccess($measureTypes);
    }

    /**
     * @OA\Post(
     *   path="/api/v1/measure",
     *   tags={"User"},
     *   description="create measure.",
     *   @OA\RequestBody(
     *         description="Measure body register",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(ref="#/components/schemas/Measure")
     *         )
     *     ),
     *   @OA\Response(response="200", description="An example resource"),
     *   @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent(ref="#/components/schemas/ErrorReponse")),
     *   @OA\Response(response=422, description="Invalid data", @OA\JsonContent(ref="#/components/schemas/ErrorReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/ErrorReponse"))
     * )
     */
    public function postMeasure(PostMeasureRequest $request)
    {
        $measure = $this->userService->createMeasure($request);
        return $this->responseSuccess($measure);
    }

    /**
     * @OA\Get(
     *   path="/api/v1/sub-categories",
     *   tags={"User"},
     *   description="Get list sub categories.",
     *   @OA\Response(response="200", description="An example resource"),
     *   @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent(ref="#/components/schemas/ErrorReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/ErrorReponse"))
     * )
     */
    public function getSubCategories()
    {
        $subCat = $this->userService->subcategories();
        return $this->responseSuccessArray($subCat);
    }

    /**
     * @OA\Get(
     *   path="/api/v1/models",
     *   tags={"User"},
     *   description="Get list models.",
     *   @OA\Parameter(
     *         name="brand",
     *         in="query",
     *         description="brand to filter by",
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *   @OA\Parameter(
     *         name="sub_category",
     *         in="query",
     *         description="sub category to filter by",
     *         @OA\Schema(
     *           type="integer",
     *           format="int64"
     *         )
     *     ),
     *   @OA\Response(response="200", description="An example resource"),
     *   @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent(ref="#/components/schemas/ErrorReponse")),
     *   @OA\Response(response=422, description="Invalid data", @OA\JsonContent(ref="#/components/schemas/ErrorDataReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/ErrorReponse"))
     * )
     */
    public function getModels(GetModelRequest $request)
    {
        $models = $this->userService->getModels($request);
        return $this->responseSuccessArray($models);
    }

    /**
     * @OA\Get(
     *   path="/api/v1/colors",
     *   tags={"User"},
     *   description="Get list colors",
     *   @OA\Response(response="200", description="An example resource"),
     *   @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent(ref="#/components/schemas/ErrorReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/ErrorReponse"))
     * )
     */
    public function getColors()
    {
        $colors = $this->userService->getColors();
        return $this->responseSuccessArray($colors);
    }

    /**
     * @OA\Post(
     *   path="/api/v1/items",
     *   tags={"User"},
     *   description="Add user items.",
     *   @OA\RequestBody(
     *         description="Items body register",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(ref="#/components/schemas/Item")
     *         )
     *     ),
     *   @OA\Response(response="200", description="An example resource"),
     *   @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent(ref="#/components/schemas/ErrorReponse")),
     *   @OA\Response(response=422, description="Invalid data", @OA\JsonContent(ref="#/components/schemas/ErrorDataReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/ErrorReponse"))
     * )
     */
    public function addItem(PostUserItemRequest $request)
    {
        $userItem = $this->itemService->addItemUser($request);
        return $this->responseSuccess($userItem);
    }

    /**
     *   @OA\Get(
     *   path="/api/v1/me",
     *   tags={"User"},
     *   description="Get profile",
     *   @OA\Response(response="200", description="An example resource"),
     *   @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent(ref="#/components/schemas/ErrorReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/ErrorReponse"))
     * )
     */
    public function show()
    {
        $user = $this->userService->getUser();
        return $this->responseSuccess($user);
    }

    /**
     * @OA\Post(
     *   path="/api/v1/me/change-password",
     *   tags={"User"},
     *   description="User update password.",
     *   @OA\RequestBody(
     *         description="Password body register",
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(ref="#/components/schemas/UpdatePasswordBody")
     *         )
     *     ),
     *   @OA\Response(response="200", description="An example resource"),
     *   @OA\Response(response=401, description="Unauthenticated", @OA\JsonContent(ref="#/components/schemas/ErrorReponse")),
     *   @OA\Response(response=422, description="Invalid data", @OA\JsonContent(ref="#/components/schemas/ErrorDataReponse")),
     *   @OA\Response(response=400, description="Bad request", @OA\JsonContent(ref="#/components/schemas/ErrorReponse"))
     * )
     */
    public function updatePassword(ChangePasswordRequest $request)
    {
        $this->userService->updatePassword($request);
        return response()->json([
            'message'    => "Your password updated!",
        ], 200);
    }
}