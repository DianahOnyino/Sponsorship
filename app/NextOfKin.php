<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NextOfKin extends Model
{
    protected $table = 'next_of_kin';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
