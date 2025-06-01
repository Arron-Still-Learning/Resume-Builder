<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'oldPassword' => ['required'],
            'newPassword' => ['required', 'min:8', 'max:16', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/', 'different:oldPassword']
        ];
    }

    public function messages()
    {
        return [
            'newPassword.regex'=> 'This password must be exactly 8 characters long and include at least one letter, one number and one special character',
        ];
    }
}
