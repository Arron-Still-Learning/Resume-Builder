<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User; // Import User model
use Illuminate\Support\Facades\Hash; // Import Hash facade

class ResetPasswordRequest extends FormRequest
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
    // public function rules()
    // {
    //     return [
    //         'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/', 'max:255'],
    //         'password' => ['required', 'same:confirmPassword', 'min:8', 'max:16', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/'],
    //         'confirmPassword' => ['required', 'min:8', 'max:16', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/']
    //     ];
    // }

    // public function messages()
    // {
    //     return [
    //         'email.regex' => 'This email must be a valid @gmail.com address',
    //         'password.regex' => 'This password must be exactly 8 characters long and include at least one letter, one number and one special character',
    //         'confirmPassword.regex' => 'This confirm password must be exactly 8 characters long and include at least one letter, one number and one special character',

    //     ];
    // }


    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
                'max:255',
                Rule::exists('users', 'email') // Ensure email exists in the 'users' table
            ],
            'password' => [
                'required', 
                'same:confirmPassword', 
                'min:8', 
                'max:16', 
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/',
                function ($attribute, $value, $fail) {
                    $user = User::where('email', $this->email)->first();
                    if ($user && Hash::check($value, $user->password)) {
                        $fail('The new password cannot be the same as the old password.');
                    }
                }
            ],
            'confirmPassword' => [
                'required', 
                'min:8', 
                'max:16', 
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/'
            ]
        ];
    }

    public function messages()
    {
        return [
            'email.regex' => 'This email must be a valid @gmail.com address',
            'email.exists' => 'This email does not exist in our database.',
            'password.regex' => 'This password must be exactly 8 characters long and include at least one letter, one number and one special character',
            'confirmPassword.regex' => 'This confirm password must be exactly 8 characters long and include at least one letter, one number and one special character',
        ];
    }
}
