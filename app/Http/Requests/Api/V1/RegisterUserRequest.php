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
            'email' => 'required|string|email|unique:users,email',
            'name' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'picture' => 'required|image|mimes:jpg,jpeg,png,gif',
            'cover' => 'required',
            'zipcode' => 'required',
            'city' => 'required',
            'country_id' => 'required',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|same:password'
        ];
        return $rules;
    }
}
