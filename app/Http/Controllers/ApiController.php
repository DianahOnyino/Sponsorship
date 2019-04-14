<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-14
 * Time: 18:37
 */

namespace App\Http\Controllers;


use App\Child;
use App\Person;

class ApiController
{
    public function getChildrenData()
    {
        $data = Child::all()->map(function ($child_record) {
            $person_details = Person::where('id', $child_record->person_id)->first()->toArray();

            return array_merge($child_record->toArray(), $person_details);
        });

        return $data;
    }
}