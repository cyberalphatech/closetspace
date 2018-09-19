<?php

namespace App\Http\Requests\Api\V1;

use App\Http\Requests\Api\Request;
use App\Models\MeasureMale;
use App\Models\MeasureFemale;

class PostMeasureRequest extends Request
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
            'gender' => 'required|in:'.MeasureMale::TYPE.','.MeasureFemale::TYPE,
            'bshape' => 'required',
            'bust' => 'required_if:gender,==,'.MeasureFemale::TYPE,
            'bra' => 'required_if:gender,==,'.MeasureFemale::TYPE,
            'waist' => 'required',
            'hips' => 'required',
            'neck' => 'required_if:gender,==,'.MeasureMale::TYPE,
            'chest' => 'required_if:gender,==,'.MeasureMale::TYPE,
            'sleeve' => 'required_if:gender,==,'.MeasureMale::TYPE,
            'inseam' => 'required_if:gender,==,'.MeasureMale::TYPE,
        ];
        return $rules;
    }
}
