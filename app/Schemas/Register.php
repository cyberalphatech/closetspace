<?php

namespace App\Schemas\Register;

/**
 * @OA\Schema(required={"email", "first_name", "last_name", "dob", "gender", "picture", "state", "city", "country_id", "password"},
 *   @OA\Xml(name="Register")
 * )
 */
class Register
{
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
     * @var \DateTime
     */
    public $dob;

    /**
     * @OA\Property(description="gender of user")
     * @var int
     */
    public $gender;

    /**
     * @OA\Property(description="avartar of user", format="binary")
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

    /**
     * @OA\Property(description="Password of user")
     * @var string
     */
    public $password;

    /**
     * @OA\Property(description="Password confirm of user")
     * @var string
     */
    public $confirm_password;

}