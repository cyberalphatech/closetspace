<?php

namespace App\Services\Api\V1;

use App\Repositories\Api\V1\MeasureTypeRepository;

class UserService
{

    private $measureTypeRepository;

    /**
     * AuthController constructor.
     *
     * @param UserRepository $userRepository UserRepository
     */
    public function __construct(
        MeasureTypeRepository $measureTypeRepository
    )
    {
        $this->measureTypeRepository = $measureTypeRepository;
    }


    public function findMeasureTypeByGender($gender)
    {
        $mesureTypes = $this->measureTypeRepository->findWhere(['gender_id'=> $gender]);
        return $mesureTypes;
    }
}