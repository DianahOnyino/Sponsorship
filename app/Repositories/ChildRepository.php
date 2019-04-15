<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-14
 * Time: 19:13
 */

namespace App\Repositories;


use App\Child;
use App\Person;

class ChildRepository
{
    public function savePersonDetails($input, $id = null)
    {
        if ($id == null) {
            $person_details = new Person();

            $person_details->first_name = $input['first_name'];
            $person_details->middle_name = $input['middle_name'];
            $person_details->last_name = $input['last_name'];;
            $person_details->date_of_birth = $input['date_of_birth'];
            $person_details->age = $input['age'];
            $person_details->gender = $input['gender'];
            $person_details->country = $input['country'];
            $person_details->city = $input['city'];

            $person_details->save();
        } else {
            $person_details = Person::findOrFail($id);

            $person_details->first_name = $input['first_name'];
            $person_details->middle_name = $input['middle_name'];
            $person_details->last_name = $input['last_name'];;
            $person_details->date_of_birth = $input['date_of_birth'];
            $person_details->age = $input['age'];
            $person_details->gender = $input['gender'];
            $person_details->country = $input['country'];
            $person_details->city = $input['city'];

            $person_details->save();
        }

        return $person_details->id;
    }

    public function saveChildDetails($person_details_id, $input, $person_id = null)
    {
        if ($person_id == null) {
            $child_details = new Child();

            $child_details->person_id = $person_details_id;
            $child_details->village = $input['village'];
            $child_details->highest_level_of_education = $input['highest_level_of_education'] == "applicable" ? 1 : 0;

            if ($input['highest_level_of_education'] == "applicable") {
                $child_details->level = $input['level'];;
                $child_details->class_level = $input['class_level'];
                $child_details->school_name = $input['school_name'];
            }

            $child_details->save();
        } else {
            $child_details = Child::where('person_id', $person_id)->first();

            $child_details->person_id = $person_details_id;
            $child_details->village = $input['village'];
            $child_details->highest_level_of_education = $input['highest_level_of_education'] == "applicable" ? 1 : 0;

            if ($input['highest_level_of_education'] == "applicable") {
                $child_details->level = $input['level'];;
                $child_details->class_level = $input['class_level'];
                $child_details->school_name = $input['school_name'];
            }

            $child_details->save();
        }
    }
}