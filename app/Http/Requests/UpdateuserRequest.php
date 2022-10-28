<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateuserRequest extends FormRequest
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
            'name'=>'required|min:3|max:15',
            'email' => 'email',
            'number' => 'numeric',
            'surname'=>'max:15',
        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'необходимо ввести электронную почту',
            'name.required' => 'необходимо ввести имя в поле',
            'name.min' => 'имя должно быть не менее 3 символов',
            'name.max' => 'имя не должно быть длиннее 15 символов',
            'surname.min' => 'фамилия должно быть не менее 3 символов',
            'surname.max' => 'фамилия не должно быть длиннее 15 символов',
            'city.required'=>'необходимо ввести город в поле',
        ];
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();

        if (!$validator->fails()) {
            $data = $this->except(['_token', '_method']);
            $this->replace($data);
        }
        return $validator;
    }
}
