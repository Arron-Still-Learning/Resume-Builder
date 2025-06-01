<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/', 'max:255'],
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
            'email.regex' => 'The email must be a valid @gmail.com address.',
            // 'password.regex' => 'The password must be exactly 6 characters long and include at least one letter, one number, and one special character.',
        ];
    }
}
