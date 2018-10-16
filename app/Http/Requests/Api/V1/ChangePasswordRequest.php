<?php

namespace App\Http\Requests\Api\V1;

use App\Http\Requests\Api\Request;

class ChangePasswordRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            "password" => 'required',
            'password_confirm' => 'required|same:password'
        ];
        return $rules;
    }
}
