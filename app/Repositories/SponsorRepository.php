<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-15
 * Time: 09:07
 */

namespace App\Repositories;


use App\Person;
use App\Sponsor;

class SponsorRepository
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

    public function saveSponsorDetails($person_details_id, $input, $person_id = null)
    {
        if ($person_id == null) {
            $sponsor_details = new Sponsor();

            $sponsor_details->person_id = $person_details_id;
            $sponsor_details->occupation = $input['occupation'];
            $sponsor_details->motivation = $input['motivation'];

            $sponsor_details->save();
        } else {
            $sponsor_details = Sponsor::where('person_id', $person_id)->first();

            $sponsor_details->occupation = $input['occupation'];
            $sponsor_details->motivation = $input['motivation'];

            $sponsor_details->save();
        }
    }
}