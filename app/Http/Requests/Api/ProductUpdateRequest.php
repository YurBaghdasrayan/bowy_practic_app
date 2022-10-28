<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'headline' => 'sometimes|string',
            'address' => 'sometimes|string',
            'description' => 'sometimes|string',
            'car_model' => Rule::exists('cars', 'id'),
            'body_type' => Rule::exists('cars', 'id'),
            'rudder' => 'sometimes|string',
            'year_of_issue' => 'sometimes|date',
            'transmission' => 'required',
        ];
    }
}
