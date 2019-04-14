<?php

namespace App\Http\Requests;


use Illuminate\Support\Facades\Validator;

class ChildRecordRequest
{
    public function validate($input)
    {
        $messages = [
            'first_name.required' => 'First name is required',
            'middle_name.required' => 'Middle name is required',
            'last_name.required' => 'Last name is required',
            'date_of_birth.required' => 'Date of birth is required',
            'age.required' => 'Age is required',
            'gender.required' => 'Gender is required',
            'country.required' => 'Country is required',
            'city.required' => 'City is required',
            'highest_level_of_education.required' => 'Schooled/Schooling is required',
            'village.required_if' => 'Village is required',
            'class_level.required_if' => 'Class Level is required',
            'level.required_if' => 'Level is required',
            'school_name.required_if' => 'School name is required',
        ];

        $rules = [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'city' => 'required',
            'highest_level_of_education' => 'required',
            'village' => 'required_if:highest_level_of_education, applicable',
            'class_level' => 'required_if:highest_level_of_education, applicable',
            'level' => 'required_if:highest_level_of_education, applicable',
            'school_name' => 'required_if:highest_level_of_education, applicable',
        ];

        $validator = Validator::make($input, $rules, $messages);

        return $validator;
    }
}
