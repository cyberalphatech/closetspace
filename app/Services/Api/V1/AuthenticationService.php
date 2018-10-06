<?php

namespace App\Services\Api\V1;

use App\Repositories\Api\V1\DeviceRepository;
use Carbon\Carbon;
use Socialite;
use App\Repositories\Api\V1\AccountSocialRepository;
use App\Repositories\Api\V1\UserRepository;
use App\Repositories\Api\V1\ProfileRepository;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Config;

class AuthenticationService {

    protected $deviceRepository;
    protected $accountSocialRepository;
    protected $userRepository;
    protected $profileRepository;

    /**
     * Constructor function
     * 
     * @param DeviceRepository $deviceRepository DeviceRepository
     */
    public function __construct(
        DeviceRepository $deviceRepository,
        AccountSocialRepository $accountSocialRepository,
        UserRepository $userRepository,
        ProfileRepository $profileRepository
    ) {
        $this->deviceRepository = $deviceRepository;
        $this->accountSocialRepository = $accountSocialRepository;
        $this->userRepository = $userRepository;
        $this->profileRepository = $profileRepository;
    }

    /**
     * This method to call after user login
     * 
     * @param type $user
     * @param type $dataDevice
     */
    public function updateDataAfterLogin($user, $dataDevice) {
        $this->deviceRepository->deleteWhere(["user_id" => $user->id]);
        $dataDevice['user_id'] = $user->id;
        $this->deviceRepository->create($dataDevice);
        $user->save();
    }

    /**
     * Process social login
     *
     * @param array $data Data of request
     *
     * @return Array
     */
    public function processSocialLogin($data) {
        try {
            $userSocial = Socialite::driver($data['provider'])->userFromToken($data['access_token']);
            if ($userSocial) {
                $accountSocial = $this->accountSocialRepository->findByProviderTypeAndProviderId($data['provider'], $userSocial->id);
                DB::beginTransaction();
                if (!$accountSocial) {
                    $email = $userSocial->getEmail();
                    if (empty($email)) {
                        $email = $userSocial->id . '@' . $data['provider'] . '.com';
                    }
                    $user = $this->userRepository->findByField("email", $email)->first();
                    
                    if (!$user) {
                        $user = $this->userRepository->create([
                            'name' => $userSocial->name,
                            'email' => $email,
                            'password' => 'social',
                            'is_actived' => User::IS_ACTIVED,
                        ]);
                        $this->profileRepository->create([
                            'email' => $email,
                            'user_id' =>$user
                        ]);
                    }
                    $accountSocial = $this->accountSocialRepository->createAccountSocical($user, $userSocial->id, $data['provider']);
                   
                }
                $user = $accountSocial->user;
                $this->updateDataAfterLogin($user, $data);
                $success['token'] =  $user->createToken(Config::get('app.name'))->accessToken;
                $success['token_type'] = 'Bearer';
                $success['user'] = $user->profile;
                DB::commit();
                return $success;
            }
        } catch (\Exception $ex) {
            DB::rollback();
            throw new \Exception($ex->getMessage());
        }
    }

    public function processLocalLogin($data)
    {
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){ 
            $user = Auth::user();
            $success['token'] =  $user->createToken(Config::get('app.name'))-> accessToken;
            $success['token_type'] = 'Bearer';
            $success['user'] = $user->profile;
            $this->updateDataAfterLogin($user, $data);
            return $success;
        }
        throw new \Exception('');
    }

    public function logout()
    {
        $user = Auth::user();
        $this->deviceRepository->deleteWhere(["user_id" => $user->id]);
        $accessToken =  $user->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
        ]);
        $accessToken->revoke();
    }

}
