<?php

namespace App\Schemas\SocialAuthen;

/**
 * @OA\Schema(required={"access_token", "provider", "device_type", "uuid"},
 *   @OA\Xml(name="SocialAuthen")
 * )
 */
class SocialAuthen
{
    /**
     * @OA\Property(description="access token of social")
     * @var string
     */
    public $access_token;

    /**
     * @OA\Property(description="Type of social", enum={"facebook", "google", "github"})
     * @var string
     */
    public $provider;

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