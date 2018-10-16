<?php

namespace App\Schemas\RegisterResponse;

/**
 * @OA\Schema()
 */
class RegisterResponse
{
    /**
     * @OA\Property(description="access token")
     * @var string
     */
    public $token;

    /**
     * @var string
     * @OA\Property(description="token type")
     */
    public $token_type;

    /**
     * @var User
     * @OA\Property(ref="#/components/schemas/User")
     */
    public $user;
}