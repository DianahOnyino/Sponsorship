<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildSponsorDetail extends Model
{
    protected $table = 'child_sponsor_details';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
