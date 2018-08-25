<?php

namespace App\Http\Requests\Api\V1;

use App\Http\Requests\Api\Request;
use App\Models\Device;

class SocialLoginRequest extends Request
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
            'access_token' => 'required|string',
            'provider' => 'required|string',
            'device_type' => 'required|in:'.Device::ANDROID . ',' . Device::IOS,
            'uuid' => 'required',
        ];
        switch ($this->device_type) {
            // device token of IOS device
            case Device::IOS:
                $rules['uuid'] = 'required|string|size:64';
                break;
            // device token of Android device
            case Device::ANDROID:
                $rules['uuid'] = 'required|string|size:152';
                break;
            default:
                break;
        }
        return $rules;
    }
}
