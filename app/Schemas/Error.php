<?php

namespace App\Schemas\Error;

/**
 * @OA\Schema(
 *   @OA\Xml(name="Error")
 * )
 */
class Error
{
    /**
     * 
     * @var string[]
     * @OA\Property(description="key of error")
     *
     */
    public $key;
}