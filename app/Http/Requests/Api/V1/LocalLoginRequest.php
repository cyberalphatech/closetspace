<?php

namespace App\Http\Requests\Api\V1;

use App\Http\Requests\Api\Request;
use App\Models\Device;

class LocalLoginRequest extends Request
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
            "email" => 'required|email',
            "password" => 'required',
            'device_type' => 'required|in:'.Device::ANDROID . ',' . Device::IOS,
            'uuid' => 'required',
        ];
        return $rules;
    }
}
