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
}