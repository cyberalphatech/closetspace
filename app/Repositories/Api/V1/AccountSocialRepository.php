<?php


namespace App\Repositories\Api\V1;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Models\SocialAccount;

class AccountSocialRepository extends BaseRepository
{
    
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return SocialAccount::class;
    }
    
    /**
     * Create account social
     *
     * @param User   $user       User
     * @param String $providerId String
     * @param String $provider   String
     *
     * @return Avoid
     */
    public function createAccountSocical($user, $providerId, $provider)
    {
        $accountSocical = new SocialAccount([
            "provider_user_id" => $providerId,
            "provider" => $provider
        ]);
        $accountSocical->user()->associate($user);
        $accountSocical->save();
        return $accountSocical;
    }
    
    /**
     * Find account social by provider and provider_id
     *
     * @param String $providerType String
     * @param String $providerId   String
     *
     * @return AccountSocial
     */
    public function findByProviderTypeAndProviderId($providerType, $providerId) {
        $accountSocial = $this->scopeQuery(function ($query) use ($providerType, $providerId) {
            return $query->where("provider", $providerType)->where('provider_user_id', $providerId);
        })->first();
        return $accountSocial;
    }
}
