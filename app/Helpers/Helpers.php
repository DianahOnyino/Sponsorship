<?php

use App\Child;
use App\Person;
use App\Sponsor;

/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-15
 * Time: 12:17
 */
function sponsorsArray()
{
    $sponsors_ids = Sponsor::all()->pluck('person_id')->toArray();

    $sponsors_array[0] = "Select Sponsor";

    foreach ($sponsors_ids as $sponsors_id) {
        $person = Person::where('id', $sponsors_id)->first();

        $sponsor_full_name = $person->first_name . ' ' . $person->middle_name . ' '. $person->last_name;

        $sponsors_array[$sponsors_id] = $sponsor_full_name;
    }

    return $sponsors_array;
}

function childrenArray()
{
    $children_ids = Child::all()->pluck('person_id')->toArray();

    $children_array[0] = "Select Child";

    foreach ($children_ids as $child_id) {
        $person = Person::where('id', $child_id)->first();

        $child_full_name = $person->first_name . ' ' . $person->middle_name . ' '. $person->last_name;

        $children_array[$child_id] = $child_full_name;
    }

    return $children_array;
}
