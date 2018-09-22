<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\Controller;
use App\Services\Api\V1\CatalogueService;
use App\Http\Requests\Api\V1\CatalogueSearchRequest;
use Symfony\Component\HttpFoundation\Response;

class CatalogueController extends Controller
{
    private $catalogueService;

    /**
     * AuthController constructor.
     *
     * @param GuestService $userService UserService
     */
    public function __construct(CatalogueService $catalogueService)
    {
        $this->catalogueService = $catalogueService;
    }

    public function search(CatalogueSearchRequest $request)
    {
        $catalogues = $this->catalogueService->search($request);
        return $this->responseSuccessArray($catalogues);
    }
}