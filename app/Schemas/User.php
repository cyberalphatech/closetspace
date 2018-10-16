<?php

namespace App\Schemas\User;

/**
 * @OA\Schema(
 *   @OA\Xml(name="User")
 * )
 */
class User
{
    /**
     * @OA\Property(description="id of user")
     * @var int
     */
    public $id;
    /**
     * @OA\Property(description="Email of user")
     * @var string
     */
    public $email;

    /**
     * @OA\Property(description="first name of user")
     * @var string
     */
    public $first_name;

    /**
     * @OA\Property(description="last name of user")
     * @var string
     */
    public $last_name;

    /**
     * @OA\Property(description="birthday of user")
     * @var string
     */
    public $dob;

    /**
     * @OA\Property(description="gender of user")
     * @var int
     */
    public $gender;

    /**
     * @OA\Property(description="avartar of user")
     * @var string
     */
    public $picture;


    /**
     * @OA\Property(description="state of user")
     * @var string
     */
    public $state;

    /**
     * @OA\Property(description="city of user")
     * @var string
     */
    public $city;

    /**
     * @OA\Property(description="country of user")
     * @var string
     */
    public $country_id;
}