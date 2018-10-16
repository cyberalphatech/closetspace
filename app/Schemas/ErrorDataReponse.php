<?php

namespace App\Schemas\ErrorDataReponse;

/**
 * @OA\Schema()
 */
class ErrorDataReponse
{
    /**
     * @OA\Property(description="message error")
     * @var string
     */
    public $message;

    /**
     * @var Error
     * @OA\Property(ref="#/components/schemas/Error")
     */
    public $errors;
}