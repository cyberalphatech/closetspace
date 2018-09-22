<?php

namespace App\Http\Requests\Api\V1;

use App\Http\Requests\Api\Request;
use App\Models\Device;

class CatalogueSearchRequest extends Request
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
            "catergory_id" => 'required',
            "sub_category_id" => 'required',
            "item_id" => 'required',
            "color_id" => 'required',
            "brand_id" => 'required'
        ];
        return $rules;
    }
}
