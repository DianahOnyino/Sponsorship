<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
