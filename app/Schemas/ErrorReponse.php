<?php

namespace App\Schemas\ErrorReponse;

/**
 * @OA\Schema()
 */
class ErrorReponse
{
    /**
     * @OA\Property(description="message error")
     * @var string
     */
    public $message;

    /**
     * @OA\Property(description="An array errors")
     * @var string
     */
    public $errors;
}