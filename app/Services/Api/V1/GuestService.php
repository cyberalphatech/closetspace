<?php

namespace App\Services\Api\V1;

use FileHelper;
use App\Repositories\Api\V1\UserRepository;
use App\Repositories\Api\V1\ProfileRepository;
use App\Repositories\Api\V1\GenderRepository;
use App\Repositories\Api\V1\StyleRepository;
use App\Repositories\Api\V1\CategoryRepository;
use DB;
use Config;

class GuestService
{
    private $userRepository;

    private $profileRepository;

    private $genderRepository;

    private $styleRepository;

    private $categoryRepository;

    /**
     * AuthController constructor.
     *
     * @param UserRepository $userRepository UserRepository
     */
    public function __construct(
        UserRepository $userRepository,
        ProfileRepository $profileRepository,
        GenderRepository $genderRepository,
        StyleRepository $styleRepository,
        CategoryRepository $categoryRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->profileRepository = $profileRepository;
        $this->genderRepository = $genderRepository;
        $this->styleRepository = $styleRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function registerUser($request)
    {
        DB::beginTransaction();
        try {
            
            $dataUser['email'] = $request->get('email');
            $dataUser['name'] = $request->get('first_name'). ' '. $request->get('last_name');
            $dataUser['password'] = bcrypt($request->get('password'));
            $user = $this->userRepository->updateOrCreate($dataUser);
            $fileName = FileHelper::storageFile($request->file('picture'), 'profile');
            $dataProfile['picture'] = $fileName;
            $dataProfile['email'] = $request->get('email');
            $dataProfile['first_name'] = $request->get('first_name');
            $dataProfile['last_name'] = $request->get('last_name');
            $dataProfile['gender'] = $request->get('gender');
            $dataProfile['dob'] = $request->get('dob');
            $dataProfile['user_id'] = $user->id;
            $dataProfile['state'] = $request->get('state');
            $dataProfile['city'] = $request->get('city');
            $dataProfile['country_id'] = $request->get('country_id');
            $profile = $this->profileRepository->updateOrCreate($dataProfile);
            $success['token'] =  $user->createToken(Config::get('app.name'))->accessToken;
            $success['token_type'] = 'Bearer';
            $success['user'] = $profile;
            DB::commit();
            return $success;
        } catch(\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function findAllGenders()
    {
        return $this->genderRepository->all();
    }

    public function findAllStyles()
    {
        return $this->styleRepository->all();
    }

    public function findAllCategories()
    {
        return $this->categoryRepository->with(['subCategory'])->all();
    }
}