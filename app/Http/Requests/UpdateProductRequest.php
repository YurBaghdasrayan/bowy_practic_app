<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
//            'city' => 'required',
//            'region' => 'required',
            'car_model' => 'required',
            'description' => 'required',
            'body_type' => 'required',
            'rudder' => 'required',
            'year_of_issue' => 'required',
            'transmission' => 'required|',
        ];
    }

    public function messages()
    {
        return [
            'headline.required' => 'Поле заголовок объявления обязательно.',
            'price.required' => 'Поле стоимость обязательно.',
            'price.numeric' => 'Поле стоимость должна быть цифры.',
//            'city.required' => 'Поле город обязательно.',
//            'region.required' => 'Поле регион обязательно.',
            'car_model.required' => 'Поле марка автомобиля обязательно.',
            'description.required' => 'Поле описание объявления обязательно.',
            'body_type.required' => 'Поле тип кузова  обязательно.',
            'rudder.required' => 'Поле руль почты обязательно.',
            'year_of_issue.required' => 'Поле год выпуска обязательно.',
//            'year_of_issue.numeric' => 'Поле год выпуска должна быть цифры.',
            'transmission.required' => 'Поле коробка передач обязательно.',
        ];
    }

    protected function getValidatorInstance()
    {
        $validate = parent::getValidatorInstance();

        if (!$validate->fails()) {
            $code = $this->except(['_token']);

            $this->replace($code);
        }
        return $validate;
    }
}
