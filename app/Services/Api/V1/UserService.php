<?php

namespace App\Services\Api\V1;

use App\Repositories\Api\V1\MeasureTypeRepository;
use App\Repositories\Api\V1\MeasureMaleRepository;
use App\Repositories\Api\V1\MeasureFemaleRepository;
use App\Repositories\Api\V1\UserRepository;
use App\Repositories\Api\V1\SubCategoryRepository;
use App\Repositories\Api\V1\ModelRepository;
use App\Repositories\Api\V1\ColorRepository;
use App\Models\MeasureMale;
use Illuminate\Support\Facades\Auth;

class UserService
{

    private $measureTypeRepository;

    private $measureMaleRepository;

    private $measureFemaleRepository;

    private $userRepository;

    private $subCategoryRepository;

    private $modelRepository;

    private $colorRepository;
    /**
     * AuthController constructor.
     *
     * @param UserRepository $userRepository UserRepository
     */
    public function __construct(
        MeasureTypeRepository $measureTypeRepository,
        MeasureMaleRepository $measureMaleRepository,
        MeasureFemaleRepository $measureFemaleRepository,
        UserRepository $userRepository,
        SubCategoryRepository $subCategoryRepository,
        ModelRepository $modelRepository,
        ColorRepository $colorRepository
    )
    {
        $this->measureTypeRepository = $measureTypeRepository;
        $this->measureMaleRepository = $measureMaleRepository;
        $this->measureFemaleRepository = $measureFemaleRepository;
        $this->userRepository = $userRepository;
        $this->subCategoryRepository = $subCategoryRepository;
        $this->modelRepository = $modelRepository;
        $this->colorRepository = $colorRepository;
    }


    public function findMeasureTypeByGender($gender)
    {
        $mesureTypes = $this->measureTypeRepository->findWhere(['gender_id'=> $gender]);
        return $mesureTypes;
    }

    public function createMeasure($request)
    {
        $user = Auth::user();
        $data = $request->all();
        $user = $this->userRepository->first();
        $data['measure_unit_id'] = 1;
        $data['user_id'] = $user->id;
        if ((int)$request->get('gender') == MeasureMale::TYPE) {
            return $this->measureMaleRepository->create($data);
        }
        return $this->measureFemaleRepository->create($data);
    }

    public function subcategories()
    {
        return $this->subCategoryRepository->all();
    }

    public function getModels($request)
    {
        $columns = array('models.id', 'models.name');
        $brandId = $request->get('brand_id');
        $subCategoryId = $request->get('sub_category_id');
        $models = $this->modelRepository->scopeQuery(function($query) use($brandId, $subCategoryId){
            return $query->join('brand_models', 'brand_models.model_id', '=', 'models.id')
                        ->join('sub_category_brands', 'sub_category_brands.brand_id', '=', 'brand_models.id')
                        ->where('brand_models.brand_id', $brandId)->where('sub_category_brands.sub_category_id', '=', $subCategoryId);
        })->all($columns);
        return $models;
    }

    public function getColors()
    {
        return $this->colorRepository->all();
    }

    public function getUser()
    {
        $user = Auth::user();
        return $user;
    }

    public function updatePassword($request)
    {
        $password = $request->get('password');
        $user = Auth::user();
        $user->password =  bcrypt($request->get('password'));
        $user->save();
    }
}