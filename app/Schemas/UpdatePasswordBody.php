<?php

namespace App\Schemas\UpdatePasswordBody;

/**
 * @OA\Schema(required={"password", "password_confirm"},
 *   @OA\Xml(name="LocalAuthen")
 * )
 */
class UpdatePasswordBody
{
    /**
     * @OA\Property(description="password of user")
     * @var string
     */
    public $password;

    /**
     * @OA\Property(description="Password confirm of user")
     * @var string
     */
    public $password_confirm;
}