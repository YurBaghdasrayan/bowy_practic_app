<?php

namespace App\Http\Requests\Api;

use App\Models\City;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ApiProductsRequest extends FormRequest
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
          return [
            'headline' => 'required',
            'price' => 'required|numeric',
            'city' => 'required',
            'region' => 'required',
            'car_model' => 'required',
            'description' => 'required',
            'body_type' => 'required',
            'rudder' => 'required',
            'year_of_issue' => 'required',
            'transmission' => 'required',
//            'address' => 'required',
            'files0' => 'required',
            'category_id' => 'required'
        ];

    }
        protected function getValidatorInstance()
    {
        $validate = parent::getValidatorInstance();

        if (!$validate->fails()) {
            $regionIdByCity = City::query()->where('id', $this->city)->value('region_id');
            if ($this->region != $regionIdByCity) {
                throw new HttpResponseException(response()->json([
                    'success' => 0,
                    'message' => 'City was not found',
                ], 404));
            }
            $code = $this->except(['_token']);

            $this->replace($code);
        }
        return $validate;
    }
}
