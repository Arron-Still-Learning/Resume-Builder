<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'mail' => ['required'],
            'subject' => ['required'],
            'name' => ['max:255'],
            'email' => ['regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/', 'max:255', 'nullable'],
            'password' => [
                'nullable',
                'min:8',
                'max:16',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/'
            ],
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
            'password.regex' => 'The password must be exactly 6 characters long and include at least one letter, one number, and one special character.',
        ];
    }
}
