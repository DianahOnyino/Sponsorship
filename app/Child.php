<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $table = 'children';
    protected $guarded = ['id', 'created_at', 'updated_at'];

}
