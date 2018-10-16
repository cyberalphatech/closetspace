<?php

namespace App\Schemas\LocalAuthen;

/**
 * @OA\Schema(required={"email", "password", "device_type", "uuid"},
 *   @OA\Xml(name="LocalAuthen")
 * )
 */
class LocalAuthen
{
    /**
     * @OA\Property(description="Email of user")
     * @var string
     */
    public $email;

    /**
     * @OA\Property(description="Password of user")
     * @var string
     */
    public $password;

    /**
     * @OA\Property(description="Type of devive, 1:Android;2:IOS", enum={1, 2})
     * @var int
     */
    public $device_type;

    /**
     * @OA\Property(description="device token")
     * @var string
     */
    public $uuid;
}