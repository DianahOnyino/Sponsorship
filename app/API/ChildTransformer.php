<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-15
 * Time: 00:59
 */

namespace App\API;


use App\Child;
use App\Person;

class ChildTransformer
{
    public function transform(Child $child)
    {
        $person_details = Person::where('id', $child->person_id)->first()->toArray();

        return array_merge($child->toArray(), $person_details);
    }
}