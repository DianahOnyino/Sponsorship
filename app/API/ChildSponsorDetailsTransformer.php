<?php
/**
 * Created by PhpStorm.
 * User: donyino
 * Date: 2019-04-15
 * Time: 13:26
 */

namespace App\API;


use App\ChildSponsorDetail;
use App\User;

class ChildSponsorDetailsTransformer
{
    public function transform(ChildSponsorDetail $childSponsorDetail)
    {
        $assigned_by = User::where('id', $childSponsorDetail->assigned_by)->first();

        return [
            'sponsor' => $childSponsorDetail->sponsor->person->first_name . ' ' .
                         $childSponsorDetail->sponsor->person->middle_name . ' ' .
                         $childSponsorDetail->sponsor->person->last_name,
            'child' => $childSponsorDetail->child->person->first_name . ' ' .
                       $childSponsorDetail->child->person->middle_name . ' ' .
                       $childSponsorDetail->child->person->last_name,
            'date_assigned' => $childSponsorDetail->date_assigned,
            'assigned_by' => $assigned_by->name,
        ];
    }
}