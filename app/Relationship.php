<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $table = 'relationships';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
