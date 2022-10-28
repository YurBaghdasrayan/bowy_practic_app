<?php

namespace App\Http\Requests;

use App\Models\City;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class CreateProductRequest extends FormRequest
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

    public function messages()
    {
        return [
            'headline.required' => 'в этом разделе необходимо заполнить все поля',
            'price.required' => 'в этом разделе необходимо заполнить все поля',
            'city.required' => 'в этом разделе необходимо заполнить все поля',
            'region.required' => 'в этом разделе необходимо заполнить все поля',
            'car_model.required' => 'в этом разделе необходимо заполнить все поля',
            'description.required' => 'в этом разделе необходимо заполнить все поля',
            'body_type.required' => 'в этом разделе необходимо заполнить все поля',
            'rudder.required' => 'в этом разделе необходимо заполнить все поля',
            'year_of_issue.required' => 'в этом разделе необходимо заполнить все поля',
            'transmission.required' => 'в этом разделе необходимо заполнить все поля',
//            'address.required' => 'в этом разделе необходимо заполнить все поля',
            'category_id.required' => 'в этом разделе необходимо заполнить все поля',
            'files0.required' => 'в этом разделе необходимо заполнить все поля',
            'price.numeric' => 'стоимость должна быть числом'
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
