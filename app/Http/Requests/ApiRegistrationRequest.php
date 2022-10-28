<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiRegistrationRequest extends FormRequest
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
            'name' => 'required|min:2|max:64|',
            'email' => 'required|max:64|unique:users|email',
            'password' => 'required|min:6|max:64|confirmed',
            'number' => 'required|min:6|max:255',
            'password_confirmation' => 'required',
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
            'email.email'=> "Не верная электронная почта",
            'number.min' => 'номер должно быть не менее 3 символов.',
            'number.max' => 'длина номера не должно превышать 64 символов..',
            'number.required' => 'Поле номера телефона обязательно',
            'name.required' => 'Необходимо ввести имя в поле.',
            'name.min' => 'Имя должно быть не менее 6 символов.',
            'name.max' => 'Имя не должно быть длиннее 64 символов.',
            'email.required' => 'Поле электронной почты обязательно.',
            'email.max' => 'Поле электронной почты должна превышать 64 символов.',
            'email.unique' => 'Повторяющаяся запись для электронной почты',
            'password.required' => 'Поле пароля обязательно.',
            'password.min' => 'Пароль должен быть не менее 6 символов.',
            'password.max' => 'Пароль не должен быть длиннее 64 символов.',
            'password.confirmed' => 'Подтверждение пароля не совпадает.',
            'password_confirmation.required' => 'Поле подтверждение пароля обязательно.',
        ];
    }
}
