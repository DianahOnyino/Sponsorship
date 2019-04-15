<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-15
 * Time: 10:11
 */

namespace App\API;


use App\Person;
use App\Sponsor;

class SponsorTransformer
{
    public function transform(Sponsor $sponsor)
    {
        $person_details = Person::where('id', $sponsor->person_id)->first()->toArray();

        return array_merge($sponsor->toArray(), $person_details);
    }
}