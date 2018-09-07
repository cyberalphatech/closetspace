<?php

namespace App\Http\Requests\Api\V1;

use App\Http\Requests\Api\Request;
use App\Models\Device;

class RegisterUserRequest extends Request
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
            'email' => 'required|string|email',
            'name' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'picture' => 'required|image|mimes:jpg,jpeg,png,gif',
            'cover' => 'required'
        ];
        return $rules;
    }
}
