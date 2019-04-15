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
    $sponsors = Sponsor::all();

    $sponsors_array[0] = "Select Sponsor";

    foreach ($sponsors as $sponsor) {
        $person = $sponsor->person;

        $sponsor_full_name = $person->first_name . ' ' . $person->middle_name . ' '. $person->last_name;

        $sponsors_array[$sponsor->id] = $sponsor_full_name;
    }

    return $sponsors_array;
}

function childrenArray()
{
    $children = Child::all();

    $children_array[0] = "Select Child";

    foreach ($children as $child) {
        $person = $child->person;

        $child_full_name = $person->first_name . ' ' . $person->middle_name . ' '. $person->last_name;

        $children_array[$child->id] = $child_full_name;
    }

    return $children_array;
}
