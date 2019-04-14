<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    protected $table = 'contributions';
    protected $guarded = ['id', 'created_at', 'updated_at'];
}
