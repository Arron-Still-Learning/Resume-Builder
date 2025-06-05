<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name' => 'required|string|max:40',
            'phone_number' => 'required|string|max:20',
            'address' => 'nullable|string|max:50',
            'email' => 'required|string|email|max:30',
            'date_of_birth' => 'required|date|before:today',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'designation' => 'nullable|string|max:40',
            'objective' => 'nullable|string|max:255',
            'skill_name.*' => 'nullable|string|max:50',
            'skill_level.*' => 'nullable|string|in:Beginner,Intermediate,Advanced,Expert,Master',
            'institution.*' => 'nullable|string|max:50',
            'degree.*' => 'nullable|string|max:50',
            'start_date_education.*' => 'nullable|date|before:today',
            'end_date_education.*' => 'nullable|date|before:today',
            'company.*' => 'nullable|string|max:50',
            'position.*' => 'nullable|string|max:50',
            'start_date_experience.*' => 'nullable|date',
            'end_date_experience.*' => 'nullable|date|after_or_equal:start_date_experience.*',
            'description_experience.*' => 'nullable|string|max:255',
            'language_name.*' => 'nullable|string|max:30',
            'proficiency.*' => 'nullable|string|in:Beginner,Intermediate,Advanced,Fluent,Native',
            'project_name.*' => 'nullable|string|max:50',
            'description_project.*' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Full name is required.',
            'full_name.string' => 'Full name must be a string.',
            'full_name.max' => 'Full name cannot exceed 40 characters.',

            'phone_number.required' => 'Phone number is required.',
            'phone_number.string' => 'Phone number must be a string.',
            'phone_number.max' => 'Phone number cannot exceed 20 characters.',

            'address.string' => 'Address must be a string.',
            'address.max' => 'Address cannot exceed 50 characters.',

            'email.required' => 'Email is required.',
            'email.string' => 'Email must be a string.',
            'email.email' => 'Email must be a valid email address.',
            'email.max' => 'Email cannot exceed 30 characters.',

            'date_of_birth.required' => 'Date of birth is required.',
            'date_of_birth.date' => 'Date of birth must be a valid date.',
            'date_of_birth.before' => 'Date of birth must be before today.',

            'img.image' => 'Image must be a valid image file.',
            'img.mimes' => 'Image must be of type: jpeg, png, jpg, gif, svg.',
            'img.max' => 'Image cannot exceed 2048 KB.',

            'designation.string' => 'Designation must be a string.',
            'designation.max' => 'Designation cannot exceed 40 characters.',

            'objective.string' => 'Objective must be a string.',
            'objective.max' => 'Objective cannot exceed 255 characters.',

            'skill_name.*.string' => 'Skill name must be a string.',
            'skill_name.*.max' => 'Skill name cannot exceed 50 characters.',

            'skill_level.*.string' => 'Skill level must be a string.',
            'skill_level.*.in' => 'Skill level must be one of: Beginner, Intermediate, Advanced, Expert, Master.',

            'institution.*.string' => 'Institution must be a string.',
            'institution.*.max' => 'Institution cannot exceed 50 characters.',

            'degree.*.string' => 'Degree must be a string.',
            'degree.*.max' => 'Degree cannot exceed 50 characters.',

            'start_date_education.*.date' => 'Start date must be a valid date.',
            'start_date_education.*.before' => 'Start date must be before today.',

            'end_date_education.*.date' => 'End date must be a valid date.',
            'end_date_education.*.before' => 'End date must be before today.',

            'company.*.string' => 'Company must be a string.',
            'company.*.max' => 'Company cannot exceed 50 characters.',

            'position.*.string' => 'Position must be a string.',
            'position.*.max' => 'Position cannot exceed 50 characters.',

            'start_date_experience.*.date' => 'Start date must be a valid date.',
            'end_date_experience.*.date' => 'End date must be a valid date.',
            'end_date_experience.*.after_or_equal' => 'End date must be after or equal to the start date.',

            'description_experience.*.string' => 'Description must be a string.',
            'description_experience.*.max' => 'Description cannot exceed 255 characters.',

            'language_name.*.string' => 'Language name must be a string.',
            'language_name.*.max' => 'Language name cannot exceed 30 characters.',

            'proficiency.*.string' => 'Proficiency must be a string.',
            'proficiency.*.in' => 'Proficiency must be one of: Beginner, Intermediate, Advanced, Fluent, Native.',

            'project_name.*.string' => 'Project name must be a string.',
            'project_name.*.max' => 'Project name cannot exceed 50 characters.',

            'description_project.*.string' => 'Project description must be a string.',
            'description_project.*.max' => 'Project description cannot exceed 255 characters.',
        ];
    }
}
