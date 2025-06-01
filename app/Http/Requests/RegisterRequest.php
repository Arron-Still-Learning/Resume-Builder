<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'unique:users,email', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/', 'max:255'],
            'password' => ['required', 'min:8', 'max:16', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/']
        ];
    }

    public function messages()
    {
        return [
            'email.regex' => 'This email must be a valid @gmail.com address',
            'password.regex' => 'This password must be exactly 8 characters long and include at least one letter, one number and one special character',
        ];
    }
}
