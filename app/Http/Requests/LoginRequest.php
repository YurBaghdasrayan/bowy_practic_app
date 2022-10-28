<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|min:3|max:64|',
            'password' => 'required|min:3|max:64',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Поле электронной почты обязательно.',
            'email.min' => 'Поле электронной почты должна быть не менее 3-х символов.',
            'email.max' => 'Поле электронной почты должна превышать 64 символов.',
            'password.required' => 'Поле пароля обязательно.',
            'password.min' => 'Пароль должен быть не менее 3 символов.',
            'password.max' => 'Пароль не должен быть длиннее 64 символов.'
        ];
    }
}
