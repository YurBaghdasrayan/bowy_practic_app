<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateUsersRequest extends FormRequest
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
            'name'=>'required|min:3|max:15',
            'email' => 'email',
            'number' => 'numeric',
            'surname' =>'required|min:3|max:15',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return [
            'email.email' => 'Необходимо ввести электронную почту',
            'number.numeric'=>'ввдъедите ваш номер чтобы с вами связались',
            'name.required' => 'Необходимо ввести имя в поле',
            'name.min' => 'Имя должно быть не менее 3 символов',
            'name.max' => 'Имя не должно быть длиннее 20 символов',
            'surname.required' => 'Необходимо ввести фамилия в поле',
            'surname.min' => 'фамилия должно быть не менее 3 символов',
            'surname.max' => 'фамилия не должно быть длиннее 20 символов',
            'city.required'=>'Необходимо ввести город в поле',
        ];
    }
}
