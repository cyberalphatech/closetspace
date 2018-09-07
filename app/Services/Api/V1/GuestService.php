<?php

namespace App\Services\Api\V1;

use FileHelper;
use App\Repositories\Api\V1\UserRepository;
use App\Repositories\Api\V1\ProfileRepository;
use DB;
use Config;

class GuestService
{
    private $userRepository;

    private $profileRepository;

    /**
     * AuthController constructor.
     *
     * @param UserRepository $userRepository UserRepository
     */
    public function __construct(UserRepository $userRepository, ProfileRepository $profileRepository)
    {
        $this->userRepository = $userRepository;
        $this->profileRepository = $profileRepository;
    }

    public function registerUser($request)
    {
        DB::beginTransaction();
        try {
            
            $dataUser['email'] = $request->get('email');
            $dataUser['name'] = $request->get('name');
            $dataUser['password'] = '';
            $user = $this->userRepository->updateOrCreate($dataUser);
            $fileName = FileHelper::storageFile($request->file('picture'), 'profile');
            $dataProfile['picture'] = $fileName;
            $dataProfile['email'] = $request->get('email');
            $dataProfile['name'] = $request->get('name');
            $dataProfile['gender'] = $request->get('gender');
            $dataProfile['dob'] = $request->get('dob');
            $dataProfile['user_id'] = $user->id;
            $dataProfile['cover'] = $request->get('cover');
            $profile = $this->profileRepository->updateOrCreate($dataProfile);
            DB::commit();
            return $profile;
        } catch(\Exception $e) {
            DB::rollback();
            throw $e;
        }
        
    }
}