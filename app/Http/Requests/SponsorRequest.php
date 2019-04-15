<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-15
 * Time: 09:05
 */

namespace App\Http\Requests;


use Illuminate\Support\Facades\Validator;

class SponsorRequest
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
//            'next_of_kin_id.required' => 'Next of kin is required',
            'occupation.required' => 'Occupation is required',
            'motivation.required' => 'The drive/motivation behind sponsoring is required',
        ];

        $rules = [
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'age' => 'required|numeric',
            'gender' => 'required',
            'country' => 'required',
            'city' => 'required',
//            'next_of_kin_id' => 'required',
            'occupation' => 'required',
            'motivation' => 'required',
        ];

        $validator = Validator::make($input, $rules, $messages);

        return $validator;
    }
}