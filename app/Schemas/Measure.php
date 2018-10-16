<?php

namespace App\Schemas\Measure;

/**
 * @OA\Schema(required={"gender", "bshape", "waist", "hips", "neck", "sleeve", "sleeve", "chest", "inseam"},
 *   @OA\Xml(name="Item")
 * )
 */
class Measure
{
    /**
     * @OA\Property(description="gender of user")
     * @var int
     */
    public $gender;

    /**
     * @OA\Property(description="body shape")
     * @var int
     */
    public $bshape;

    /**
     * @OA\Property(description="waits value")
     * @var int
     */
    public $waist;

    /**
     * @OA\Property(description="hips value")
     * @var int
     */
    public $hips;

    /**
     * @OA\Property(description="neck value")
     * @var int
     */
    public $neck;

    /**
     * @OA\Property(description="sleeve value")
     * @var int
     */
    public $sleeve;

    /**
     * @OA\Property(description="chest value")
     * @var int
     */
    public $chest;

    /**
     * @OA\Property(description="inseam value")
     * @var int
     */
    public $inseam;
}