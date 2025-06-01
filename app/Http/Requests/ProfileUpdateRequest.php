<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the task is authorized to make this request.
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
            'name' => ['required', 'max:255'],
            'email' => [
                'required',
                Rule::unique('users', 'email')->ignore($this->route('id')),
                'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
                'max:255'
            ],
            'image' => ['mimes:png,jpg,jpeg']
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.regex' => 'The email must be a valid @gmail.com address.'
        ];
    }
}
